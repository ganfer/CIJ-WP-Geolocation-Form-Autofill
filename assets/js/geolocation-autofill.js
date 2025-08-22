document.addEventListener("d365mkt-afterformload", function () {
	var cityField = document.querySelector("input[name='address1_city']");
	var zipField = document.querySelector("input[name='address1_postalcode']");

	if (!("geolocation" in navigator) || (!cityField && !zipField)) {
		return;
	}

	var onSuccess = function (position) {
		var latitude = position.coords.latitude;
		var longitude = position.coords.longitude;
		var geolocationApiUrl =
			"https://nominatim.openstreetmap.org/reverse?format=json&addressdetails=1&lat=" +
			encodeURIComponent(latitude) +
			"&lon=" +
			encodeURIComponent(longitude);

		fetch(geolocationApiUrl, { method: "GET" })
			.then(function (response) {
				return response.json();
			})
			.then(function (data) {
				if (!data || !data.address) {
					return;
				}
				var city =
					data.address.city ||
					data.address.town ||
					data.address.village ||
					data.address.state_district ||
					"";
				var zip = data.address.postcode || "";

				if (cityField && city) {
					cityField.value = city;
				}
				if (zipField && zip) {
					zipField.value = zip;
				}
			})
			.catch(function () {
				// Fail silently
			});
	};

	var onError = function () {
		// Fail silently
	};

	navigator.geolocation.getCurrentPosition(onSuccess, onError, {
		enableHighAccuracy: false,
		timeout: 10000,
		maximumAge: 300000,
	});
});