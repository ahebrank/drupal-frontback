(function() {
  window.frontback = {
    repo: drupalSettings.frontback.repo_id,
    postUrl: drupalSettings.frontback.endpoint,
    options: drupalSettings.frontback.options,
    extra: drupalSettings.frontback.extra
  };
  var s = document.createElement('script'),
      x = document.getElementsByTagName('script')[0];
  var script = document.createElement('script');
  script.src = frontback.postUrl + '/assets/js/frontback.js?v=' + drupalSettings.frontback.version;
  document.body.appendChild(script);
})();