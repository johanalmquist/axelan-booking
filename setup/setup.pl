use warnings;
use strict;

#copy the .env file to / path
system("cp .env ..");
#check if .env whas copied
unless (-e "../.env"){
print "You must create the .env file\n";
exit;
}
chdir("..");
#install all packages
system("composer install");
#set the aooliction key
system("php artisan key:generate");
#make all tables
system("php artisan migrate");
#run script to add first user with admin access
system("php artisan axelan:addAdminUser");
#run script to merge users and books from old system to new system
system("php artisan axelan:merge");

print "All done!\n";

