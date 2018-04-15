#!/bin/bash

# Exit if any command fails
set -e

# Change to the expected directory
cd "$(dirname "$0")"
cd ..

# Enable nicer messaging for build status
YELLOW_BOLD='\033[1;33m';
COLOR_RESET='\033[0m';
status () {
	echo -e "\n${YELLOW_BOLD}$1${COLOR_RESET}\n"
}

# Get version number from package.json
PACKAGE_VERSION=$(cat package.json \
  | grep version \
  | head -1 \
  | awk -F: '{ print $2 }' \
  | sed 's/[",\t ]//g')

status "
.______    __    _______ .______     ______   ___   ___
|   _  \  |  |  /  _____||   _  \   /  __  \  \  \ /  /
|  |_)  | |  | |  |  __  |  |_)  | |  |  |  |  \  V  / 
|   _  <  |  | |  | |_ | |   _  <  |  |  |  |   >   <  
|  |_)  | |  | |  |__| | |  |_)  | |  \`--'  |  /  .  \ 
|______/  |__|  \______| |______/   \______/  /__/ \__\
";

# Make sure there are no changes in the working tree.  Release builds should be
# traceable to a particular commit and reliably reproducible.  (This is not
# totally true at the moment because we download nightly vendor scripts).
changed=
if ! git diff --exit-code > /dev/null; then
	changed="file(s) modified"
elif ! git diff --cached --exit-code > /dev/null; then
	changed="file(s) staged"
fi
if [ ! -z "$changed" ]; then
	git status
	echo "ERROR: Cannot build theme zip with dirty working tree."
	echo "       Commit your changes and try again."
	exit 1
fi

branch="$(git rev-parse --abbrev-ref HEAD)"
if [ "$branch" != 'master' ]; then
	echo "WARNING: You should probably be running this script against the"
	echo "         'master' branch (current: '$branch')"
	echo
	sleep 2
fi

# Remove ignored files to reset repository to pristine condition. Previous test
# ensures that changed files abort the plugin build.
status "Cleaning working directory..."
git clean -xdf

# Run the build
status "Installing dependencies..."
npm install
composer install
status "Generating build..."
npm run build

# Remove any existing zip file
rm -f bigbox*.zip

# Update version in style.css
sed -i "" "s|BIGBOX_VERSION|${PACKAGE_VERSION}|g" style.css

# Generate the plugin zip file
status "Creating archive..."
zip -r bigbox.zip \
	functions.php \
	footer.php \
	header.php \
	index.php \
	style.css \
	app \
	bootstrap \
	resources/views \
	public \
	vendor \
	LICENSE \
	CHANGELOG.md \
	screenshot.png

# Rename and cleanup.
unzip bigbox.zip -d bigbox && zip -r "bigbox-$PACKAGE_VERSION.zip" bigbox
rm -rf bigbox && rm -f bigbox.zip

# Reset style.css -- kinda ghetto.
git reset head --hard

status "Done. Version v$PACKAGE_VERSION build complete."
