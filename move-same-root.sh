#!/bin/sh
# Run this script from the project root

find 'public' -maxdepth 1 -exec mv "{}" . \;
rmdir 'public'

find . -type f -name '*.php' -exec sed -i 's/dirname($_SERVER\['\''DOCUMENT_ROOT'\''\])/$_SERVER\['\''DOCUMENT_ROOT'\''\]/g' "{}" \;

