<table>
    <thead>
    <tr>
        <th>DMR ID</th>
        <th>DMR Name</th>
        <th>REGION</th>
        <th>CONC</th>
        <th>TERRITORY</th>
        <th>VISITING AREA</th>
        <th>VISITING ROUTE</th>
        <th>TM MARKET NAME</th>
        <th>CHANNEL</th>
        <th>RETAILER</th>
        <th>CODE</th>
        <th>STOCK LEVEL</th>
        <th>CABINET TYPE</th>
        <th>CABINET LIVERY CONDITION</th>
        <th>COTC AVAILABILITY/NEW INNOVATION</th>
        <th>NEW INNOVATION STATUS</th>
        <th>NEW INNOVATION POSM</th>
        <th>WALLS VISIBILITY</th>
        <th>CABINET PLACEMENT</th>
        <th>COMPETITION</th>
        <th>COMPETITION VISIBILITY</th>
        <th>REMARKS</th>
        <th>IMAGE</th>
        <th>Submited On</th>
    </tr>
    </thead>
    <tbody>
    @foreach($marketvisitsreport as $report)
        <tr>
            <td>{{ $report->user->employeeid }}</td>
            <td>{{ $report->user->name }}</td>
            <td>{{ $report->territory->conc->region->name }}</td>
            <td>{{ $report->territory->conc->name }}</td>
            <td>{{ $report->territory->name }}</td>
            <td>{{ $report->visiting_area }}</td>
            <td>{{ $report->visiting_route  }}</td>
            <td>{{ $report->tm_market_name}}</td>
            <td>{{ $report->channel }}</td>
            <td>{{ $report->retailer }}</td>
            <td>{{ $report->retailer_code }}</td>
            <td>{{ $report->stock_level }}</td>
            <td>{{implode(', ',unserialize($report->cabinet_type)) }}</td>
            <td>{{ $report->cabinet_condition }}</td>
            <td>{{ implode(', ',unserialize($report->cotc_availability)) }}</td>
            <td>{{ implode(', ',unserialize($report->new_innovation_status)) }}</td>
            <td>{{ implode(', ',unserialize($report->new_innovation_posm)) }}</td>
            <td>{{ implode(', ',unserialize($report->walls_visibility)) }}</td>
            <td>{{ implode(', ',unserialize($report->cabinet_placement)) }}</td>
            <td>{{ implode(', ',unserialize($report->competition_visibility)) }}</td>
            <td>{{ implode(', ',unserialize($report->competition_visibility_type)) }}</td>
            <td>{{ $report->remarks }}</td>
            <td>{{asset('/images/visitreport')}}/{{ $report->images }}</td>
            <td>{{ $report->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>