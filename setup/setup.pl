use warnings;
use strict;

#copy the .env file to / path
system("cp .env ..");
#check if .env whas copied
unless (-e "/srv/users/serverpilot/apps/axebook-io/.env"){
print "You must create the .env file\n";
exit;
}
#install all packages
system("composer install");
#set the aooliction key
system("php artisan key:generate");
#make all tables
system("php artisan migrate");
#run script to add first user with admin access
system("php artisan axelan:addAdminUser");

print "All done!\n";

