=====================================================================
Login Details:
Super Admin--
email=admin@gmail.com
password=apple
--------------------------------------------------------------------
Normal Admin--
email=rajan@gmail.com
password=r
--------------------------------------------------------------------
User -- Drop register and add user
email:
password:
---------------------------------------------------------------------
Product-- add product by logging into above admins
------------------------------------------------------------------------
=====================================================================
File Upload:
max upload size is 4mb or maybe 5mb
php.ini file ma file upload on garnu parcha ani max size 12mb deu
jpg,png,jpeg files only allowed
=====================================================================
0 is viewed as positive and 1 as negative in db. DOnt worry muni bujchou :P
=======================================================================
Admin delete huda tyo admin ko product ni delete huncha
normal admin cannot access admins.php which has all the CRUD of admins
=====================================================================
Admin Review Section
FIrst ma review user le add garda tesko status 1 huncha nai admin panel ma DOnt Allow vanera dekhoucha
teasmai click gareo vane allow huncha nai status 0 huncha
front end ma ni tei milako cha status 0 mattra tanne vanera
=======================================================================
email is in classAdminProduct line 53 function named sendEmail, it is commented inside function addproduct function on  line 132
===================================================
Repeated code lai breakdown gareko cha
for eg.
Front end ko code lai breakdown garerea include folder vitra rakheko cha
COde reuse ko lai ramro garkeo cha
==================================================
Folder structuring ramro gareko cha
admin ko part admin folder vitra cha
dbCOnfig chai database connection ko file ho jun chai bahira ko class vitra cha
same code kina admin ma lekhnu vanera tei bahira kai code use garkeo cha
css files are inside css folder and same goes for db, images
==================================================
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
----used from w3schools  https://www.w3schools.com/css/css_navbar.asp
..

https://www.youtube.com/watch?v=kEW6f7Pilc4------Learnt pdo

https://stackoverflow.com/questions/16463030/how-to-add-facebook-share-button-on-my-website --sharebutton --sharer in _productdetail.php line 43

https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started---checking session started

https://stackoverflow.com/questions/409351/post-vs-serverrequest-method-post    -----['REQUEST_METHOD']==POST extract($_post) an useful and another way to get variable form post and extract them
https://www.w3schools.com/php/php_file_upload.asp---for image upload in product
https://www.w3schools.com/php/func_mail_mail.asp---for email in classAdminProduct line 57, it is commented inside function addproduct line 139
