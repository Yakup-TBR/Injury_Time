if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
        console.log(position.coords.latitude, position.coords.longitude);
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        fetch("https://nominatim.openstreetmap.org/reverse?format=json&lat=" + lat + "&lon=" + long)
            .then(response => response.json())
            .then(data => {
                console.log(data);
        const locationName = `${data.address.city || data.address.village || data.address.town || data.address.county || data.address.state || "Lokasi tidak dikenal"}, ${data.address.country}`;
        document.getElementById("lokasi").value = locationName;

        document.getElementById("lokasi").href = `https://www.maps.google.com?q=${lat},${long}`;

            
    }).catch(error => {
        console.error("Error:", error
        );
        document.getElementById("lokasi").value = "Tidak dapat mendeteksi lokasi";
    }
    );
    (error)=>{
        console.error("Error:", error
        );
        document.getElementById("lokasi").value = "Izin lokasi ditolak";
    }   
    
    });
    }else{
        document.getElementById("lokasi").value = "Browser tidak mendukung geolocation";

    }
    