-------------------------------------------------------------
showlister :: a simple performance calendar management system
-------------------------------------------------------------

CURRENT VERSION
.05b

VERSION HISTORY
.05b    12/14/2004  Critical bug fixes to admin interface
.04b    12/09/2004  Minor fixes + feature enhancements
.03b    01/25/2004  Minor fixes + minor feature enhancements
.02b    08/10/2003  First revision (first multi-artist version)
.01b    01/19/2003  Initial release

CHANGE LOG
fixed in .05b
-fixes two bugs in the admin interface which were causing shows to be assigned the 
wrong artist ID.  These bugs were introduced in .04b

fixed in .04b:
-failure to call methods.inc.php in sample pages

fixed in .03b:
-error in the SQL section of README.txt
-problem with apostrophes in text fields in the admin interface

fixed in .02b:
-sorting problems in the samples pages and management interface

added in .04b:
-new sample shows pages (sample_shows_page_005.php, sample_shows_page_006.php)
-"phone" field to add/edit/manage artists pages
-artist email and URL are now clickable on manage_artists.php
-new show entry date defaults to current year/month/day (admin/index.php)
-db_setup.sql file (for easier table creation using phpMyAdmin and other tools)
-tested against PHP5 and MySQL 4.1 (no problems)

added in .03b:
-a new sample shows page (sample_shows_page_004.php)

added in .02b:
-multi-artist capability
-more sample pages 
-better security

LICENSE
Showlister is distributed via the GNU Public License (GPL).  It's free as in 
freedom and as in free beer.  You're under no obligation to pay for it.  And, 
though I hope you'll find it useful, it is provided as-is, without any warranty 
whatsoever.  For more GPL details, see http://www.gnu.org.  

AUTHOR
wheat@wheatdesign.com
http://www.wheatdesign.com

DESCRIPTION
Showlister is designed for bands and other performers who need to be able to 
easily update their online performance calendar.  It's a simple web application 
that lets most anyone add, edit, and delete shows to a database.  Sample 
'shows' pages are included to demonstrate how to pull current shows from the 
database.  You can manage shows/events for multiple bands.   

DISTRIBUTION
http://showlister.sourceforge.net

REQUIREMENTS
Showlister requires a web server running PHP 4+ and MySQL 3.23+

INSTALLATION
[see the next sections if you're upgrading from the previous version, .03b]
1) Upload the showlister "admin" and "samples" directories to your web server.  

2) You'll need to modify the "showlister_settings.inc.php" (there is one in 
the 'admin' folder and one in the 'samples' folder; change both) files to 
include the database name and database table names along with your MySQL 
connection settings (i.e. host, username, and password).     

3) Create a database (or a new table in an existing database).  Suggested 
names are in the "showlister_settings.inc.php" file (database name = "showlister"; 
table name = "showlister_shows", etc.) but you can use whatever you like (or, 
depending upon your web host, whatever you have to.  Here's the SQL to create 
the tables you'll need.  You can also use the SQL file db_setup.sql (in the 
admin directory):

create table showlister_shows (
    show_id int(11) not null auto_increment,
    month int(2),
    day int(2),
    year int(4),
    location varchar(100),
    venue varchar(100),
    details varchar(100),
    artist_id int(11), 
    primary key (show_id)
);
create table showlister_artists (
    artist_id int(11) not null auto_increment, 
    artist_name varchar(100),
    artist_email varchar(100),
    artist_url varchar(100),
    artist_phone varchar(100),
    primary key (artist_id)
);

4) Password protext your admin folder.  (On Apache, you do this by creating an 
.htaccess file in the protected folder and running the htpasswd program to 
generate a password file.  Some hosts have scripts in place to automate this 
process for you.  If you're new to Apache, read up on .htaccess files at 
http://www.apache.org or search for an .htaccess tutorial with 
http://www.google.com).  Put the "samples" folder wherever you like, but don't 
leave it inside your admin folder or any other protected folder.  

5) Fire up your web browser and load the index.php file of the admin foler. If 
you put it in the web document root folder, you'll access it as 
http://www.yoursite.com/admin/ (some hosts use this address for other purposes.  
If yours does, just drop 'admin' and 'samples' into another folder (perhaps one 
called 'showlister'.  In that case, your url will be 
http://www.yoursite.com/showlister/admin).  Add at least one artist, and then 
start adding your shows.  Then open up the samples/index.php in another tab or 
window.  Refresh/reload that window to see your shows displayed.  
Repeat as necessary.

6) Rename the page you find most useful to something reasonable 
(like 'shows.php') and hack the showlister.css files to give the shows page and 
the admin interface a look you like.  

UPGRADING FROM VERSION .03b
The following files have changed or been added since version .02b:

  README.txt

Run the following SQL to update your showlister_artists table:

alter table showlister_artists (
    add artist_phone varchar(100) 
);

CUSTOM INSTALLATION/UPGRADE
If you're clueless about servers and setting up databases, I can install 
showlister on your server (or upgrade your current install to the latest version 
for you for a small fee.  I can also create a custom 'shows' page to fit your 
needs and integrate well with the rest of your site.  Contact me for details.    

CUSTOMIZATION OF LOOK AND FEEL
All formatting in showlister is handled via CSS.  So, hacking the 
showlister.css file should make it fairly easy to customize the look to suit
your tastes.    

TOOLS
Version .04b of showlister was created with jEdit 4.2Final and tested using
Apache 2.0.52, PHP 5.0.2, MySQL 4.1.7, MySQL Administrator 1.0.14, MySQL Control 
Center 0.9.4, FireFox 1.0 and Cygwin.  

Version .03b of Showlister were created with EditPad Pro 4.5.3 and tested 
using Apache 1.3.27, PHP 4, MySQL 3.23.51, Firebird 0.7, MySQL Control 
Center 0.9.4, and Cygwin    

THANKS
Takeover Records (http://www.takeoverrock.com/), Fidelity Records 
(http://www.fidelityrecords.com/), and Kevin B. Robbins at MoreOn Productions 
(http://www.moreonproductions.com/) for using showlister on tons of sites and 
for all the great feedback, Corey Knafelz (ck@fuzzylogical.com) for his question 
which led to the solution presented in sample_shows_page_004.php.  Lee Mikles 
(Lee@GetCohesive.com) for his code contribution which led to the solution 
presented in sample_shows_page_005.php.  The webmaster at Lakecircle.com for his 
code contribution (haven't worked it in yet, but it's good stuff).  Steve at 
dawnoftime.com for invaluable feedback.  And thanks to all the musicians, 
designers, artists, and speakers running showlister on their sites.  
 
CODA
I hope you enjoy showlister.  Please email any bugs or feature requests directly 
to me.   If you extend it in any useful way, I'd appreciate it if you'd submit 
your changes for possible inclusion into future versions.  If you make money 
designing webpages and use showlister to add value to your client work, we would 
certainly appreciate a donation (and no donation is too small).  This project is 
set up to accept donations through the sourceforge.net site.  The URL for your 
donation is here:

  http://sourceforge.net/donate/index.php?group_id=70900

I appreciate links to the showlister homepage from showlister users and I'll 
happily link out to you from the showlister home page if you'll send me the 
URL of a page you've created using showlister.       

-------------------------------------------------------------
showlister :: a simple performance calendar management system
-------------------------------------------------------------