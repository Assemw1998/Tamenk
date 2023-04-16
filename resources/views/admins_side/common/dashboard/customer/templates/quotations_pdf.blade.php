<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border: 2px solid black;
}
td{

    border: 2px solid black; 
}
b{
    display: block;
}
td{
    text-align: center;
}
</style>
</head>
<body>
<table>
    <tr>
        @foreach($quotations as $quotation)
            <td>
                <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents(public_path($quotation->insuranceCompany->companyLogo->logo_url) ))}}"  style="width:75px;height:75px; border-radius: 50%;    border-style: double;
                border-color: #680a0a;
                margin: 11px;">
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($quotations as $quotation)
            <td>
                <b style="display: block;">{{$quotation->insuranceCompany->name}}</b>
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($quotations as $quotation)
            <td>
                <div style="margin: 10px;"><b>*Insurance Type:</b>  {{$quotation->InsuranceTypeValue}}</div>
                <div style="margin: 10px;"><b>*Personal Accident Benefits For Drivere:</b> {{($quotation->personal_accident_benefits_for_driver)?"Yes":"No"}}</div>
                <div style="margin: 10px;"><b>*Personal Accident Benefits For Passenger:</b> {{($quotation->personal_accident_benefits_for_passenger)?"Yes":"No"}}</div>
                <div style="margin: 10px;"><b>*Rent A Car:</b> {{($quotation->rent_a_car)?"Yes":"No"}}</div>
                @foreach($quotation->extraInformationInputsAsArray as $key=>$value)
                <div style="margin: 10px;"><b>*{{$key}}:</b> {{($value)?"Yes":"No"}}</div>
                @endforeach
            </td>
        @endforeach
    </tr>

    <tr>
        @foreach($quotations as $quotation)
            <td>
                <div style="margin: 10px;"><b>*Price:</b> {{$quotation->price}}</div>
                <div style="margin: 10px;"><b>*Vat:</b> {{$quotation->vat}}</div>
                <div style="margin: 10px;"><b>*Total:</b> {{$quotation->total}}</div>
            </td>
        @endforeach
    </tr>
  </table>
</body>
</html>
