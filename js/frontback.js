(function ($, Drupal, drupalSettings) {

  frontbackRepo = drupalSettings.frontback.repo_id;
  frontbackPostURL = drupalSettings.frontback.endpoint;
  
  var s = document.createElement('script'),
      x = document.getElementsByTagName('script')[0];
  var script = document.createElement('script');
  script.src = frontbackPostURL + '/assets/js/frontback.js';
  document.body.appendChild(script);

})(jQuery, Drupal, drupalSettings);