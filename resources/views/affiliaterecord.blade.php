<html>
    <body>
        <h1>Affiliate that lives within 100km from the dublin office</h1>
		<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Distance (km)</th>
            </tr>
        </thead>
        <tbody>
				@php                    
                    function haversinseDistance($lat1, $lon1, $lat2, $lon2) {                 
                        $earthRadius = 6371;

                        $dLat = deg2rad($lat2 - $lat1);
                        $dLon = deg2rad($lon2 - $lon1);

                        $a = sin($dLat / 2) * sin($dLat / 2) +
                             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
                             sin($dLon / 2) * sin($dLon / 2);

                        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
                       
                        $distance = $earthRadius * $c;

                        return $distance;
                    }
                @endphp
				@foreach(json_decode($jsonData)->data as $person)                
					@php
						$distance = haversinseDistance($myLatitude, $myLongitude, $person->latitude, $person->longitude);
					@endphp
					@if ($distance <= 100)
						<tr>
							<td>{{ $person->name }}</td>
							<td>{{ $person->latitude }}</td>
							<td>{{ $person->longitude }}</td>
							<td>{{ number_format($distance, 2) }}</td>
						</tr>
					@endif
            @endforeach
        </tbody>
    </table>
    </body>
</html>