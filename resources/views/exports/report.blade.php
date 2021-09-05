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
        <th>VISIT WITH</th>
        <th>DESIGNATION</th>
        <th>CHANNEL</th>
        <th>RETAILER</th>
        <th>RETAILER CODE</th>
        <th>BAR CODE</th>
        <th>RETAILER TYPE</th>
        <th>STOCK LEVEL</th>
        <th>CABINET TYPE</th>
        <th>CABINET LIVERY CONDITION</th>
        <th>COTC AVAILABILITY/NEW INNOVATION</th>
        <th>NEW INNOVATION STATUS</th>
        <th>HOUSE KEEPING</th>
        <th>PRICE CARD CONDITION</th>
        <th>POSM DEPLOYMENT</th>
        <th>WALLS VISIBILITY</th>
        <th>CABINET PLACEMENT</th>
        <th>CABINET POSITION CHANGE</th>
        <th>COMPETITION</th>
        <th>COMPETITION VISIBILITY</th>
        <th>VERIFICATION</th>
        <th>VISITER REMARKS</th>
        <th>RETAILER CONTACT</th>
        <th>RETAILER FEEDBACK</th>
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
            <td>{{ $report->visit_with}}</td>
            <td>{{ $report->visit_with_designation}}</td>
            <td>{{ $report->channel }}</td>
            <td>{{ $report->retailer }}</td>
            <td>{{ $report->retailer_code }}</td>
            <td>{{ $report->bar_code }}</td>
            <td>{{ $report->retailer_type }}</td>
            <td>{{ $report->stock_level }}</td>
            <td>{{implode(', ',unserialize($report->cabinet_type)) }}</td>
            <td>{{ $report->cabinet_condition }}</td>
            <td>{{ implode(', ',unserialize($report->cotc_availability)) }}</td>
            <td>{{ implode(', ',unserialize($report->new_innovation_status)) }}</td>
            <td>{{ implode(', ',unserialize($report->house_keeping)) }}</td>
            <td>{{ $report->price_card_condition }}</td>
            <td>{{ $report->new_innovation_posm }}</td>
            <td>{{ implode(', ',unserialize($report->walls_visibility)) }}</td>
            <td>{{ implode(', ',unserialize($report->cabinet_placement)) }}</td>
            <td>{{ $report->cabinet_position_change != '' ? implode(', ',unserialize($report->cabinet_position_change)) : '' }}</td>
            <td>{{ implode(', ',unserialize($report->competition_visibility)) }}</td>
            <td>{{ implode(', ',unserialize($report->competition_visibility_type)) }}</td>
            <td>{{ implode(', ',unserialize($report->verification)) }}</td>
            <td>{{ $report->remarks }}</td>
            <td>{{ $report->retailer_contact }}</td>
            <td>{{ $report->retailer_feedback }}</td>
            <td>{{asset('/images/visitreport')}}/{{ $report->images }}</td>
            <td>{{ $report->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>