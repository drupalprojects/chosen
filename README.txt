-- SUMMARY --

Chosen uses the Chosen jQuery plugin to make your <select> elements more user-friendly.


-- INSTALLATION --

  1. Download the Chosen jQuery plugin (http://harvesthq.github.com/chosen/) and extract the file under sites/all/libraries.
  2. Download and enable the module.
  3. The Drupal 6 Version needs the jQuery Update module and a patch to work. See http://drupal.org/node/1223556#comment-5351828
  4. Here are instructions to get jQuery Update running for Chosen in Drupal 6 :
      git clone --branch 6.x-2.x http://git.drupal.org/project/jquery_update.git
      cd jquery_update
      wget http://drupal.org/files/jquery_update_17-1067290-116.patch
      git apply jquery_update_17-1067290-116.patch
  5. You can configure Chosen at Administer > Site Configuration > Chosen (requires administer site configuration permission)
