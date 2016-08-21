    $("#phone").intlTelInput({
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: false,
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
       geoIpLookup: function(callback) {
         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
           callback(countryCode);
         });
       }
      // initialCountry: "auto",
       //nationalMode: true,
       //numberType: "MOBILE",
       //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      //preferredCountries: ['cn', 'jp'],
      //separateDialCode: true,
      //utilsScript: "build/js/utils.js"
    });

  var startDate = new Pikaday(
      {
          field: document.getElementById('dateBirthID'),
          firstDay: 1,
          position: 'bottom left',
          minDate: new Date(),
          //maxDate: new Date(2020, 12, 31),
          yearRange: [2016,2020],
          onSelect: function() {
             
          }
      });
      

function postJobSearchFuc(){
	location.href="post-job-search.php";
}

