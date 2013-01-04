(function($) {
  $(document).ready(function() {
    // Embed the map.
    $().gogMap(Drupal.settings.jnet_community_map.data_map_json, [{ gamma: .25 },{ lightness: 0 },{ hue: "#000000" },{ visibility: "simplified" },{ saturation: 0 }]);
  });
})(jQuery);
