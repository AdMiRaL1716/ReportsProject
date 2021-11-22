<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report for the {{$customer->firstname}} {{$customer->lastname}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        @page {
            margin: 50px 50px 225px 50px;
        }
        #footer {
            position: fixed;
            bottom: -195px;
            height: 200px;
            color: #a8a8a8;
            font-size: 12px;
        }
        .border-left { border-left:1px solid #232323; }
        .border-right { border-right:1px solid #232323; }
        .border-top { border-top:1px solid #232323; }
        .border-bottom { border-bottom:1px solid #232323; }
        .none-border { border:none; border-bottom:1px solid #232323; }
        .head, .detail-head, .detail-content { text-align:center; padding-top: 5px; padding-bottom: 5px;}
        .detail-total { text-align:right; }
        .space {height:100px;}
        .content td { padding:5px; }
        [placeholder]:empty:before {
            font-size:14px;
            content: attr(placeholder);
            color: #232323;
        }

        [placeholder]:empty:focus:before {
            content: "";
        }
        .content-editable { color:green; font-size:14px; }
        .ui-autocomplete {min-height:300px; overflow:auto;}
        .ui-autocomplete-loading {
            background: white url("https://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/smoothness/images/ui-anim_basic_16x16.gif") right center no-repeat;
        }

        body,
        .modal-open .page-container,
        .modal-open .page-container .navbar-fixed-top,
        .modal-open .modal-container {
            overflow-y: scroll;
        }

        @media (max-width: 979px) {
            .modal-open .page-container .navbar-fixed-top{
                overflow-y: visible;
            }
        }
        .saveBtn { width: 10%; float: left; text-align: center; vertical-align: middle;  }
        /* .ean { width: 80%; float: left; } */
        .tooltip{ font-size: 12px !important; }
        /* .add-a-savePoDetail{ width: 15%; float:right; display:none;} */
        .addPoDetail .modal-body { margin-left:10px;}
        #addPoDetailForm {width:100%; margin-bottom: 0;}
        .required {color:red;}
        .page-number:before {
            content: counter(page);
        }
    </style>
</head>
<body>
<div id="footer">
    <p class="text-center">Partial reproduction of this document is prohibited without prior permission from the Laboratory<br>TEST REPORT no 9-5-1/xxx-xx</p>
    <hr style="border: 1px solid #8f8f8f;">
    <p style="padding-bottom: 5px;">TALLINN UNIVERSITY OF<br>TECHNOLOGY</p>
    <div style="width: 200px; display: inline-block;">
        <p>Ehitajate tee 5<br>19086 Tallinn<br>Registry code 74000323</p>
    </div>
    <div style="width: 200px; display: inline-block;">
        <p>Phone 620 2002<br>E-mail info@taltech.ee<br>www.taltech.ee</p>
    </div>
    <div class="text-right" style="margin-top: -20px;">
        <span class="page-number"></span>
    </div>
</div>
<div style="width: 100%">
    <img src="{{ public_path('logo.jpg') }}" style="width: 200px; height: 200px">
</div>
<div class="ml-3" style="width: 400px; display: inline-block; margin-top: -40px;">
    <p style="color: #8c8c8c; font-size: 14px;"><b>OIL SHALE COMPETENCE CENTRE<br>LABORATORY OF FUELS TECHNOLOGY</b></p>
</div>
<div style="width: 300px; display: inline-block; float: right;">

</div>
<p class="ml-3" style="font-size: 14px;"><b>TEST REPORT no 9-5-1/xxx-xx</b></p>
<table class="table table-bordered" style="border-color: #232323;">
    <thead>
    <tr>
        <th scope="col" style="border-color: #232323; border-bottom: none; border-right: none; font-weight: 400;">SAMPLES</th>
        <th scope="col" style="border-color: #232323; border: none;"></th>
        <th scope="col" style="border-color: #232323; border-bottom: none; font-weight: 400;">CUSTOMER</th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px;">Sample name</th>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px;">Reg. no</th>
        <th scope="col" style="border: none; padding: 5px; font-weight: 400;">Registration code {{$customer->code}}</th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px;"></th>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px;"></th>
        <th scope="col" style="border: none; padding: 5px; font-weight: 400;">Address {{$customer->address}}</th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 15px;"></th>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 15px;"></th>
        <th scope="col" style="border: none; padding: 15px;"></th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px;"></th>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px;"></th>
        <th scope="col" style="border: none; padding: 5px; font-weight: 400;">Contact</th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px; font-weight: 400; border-right: none;">Sampling Samples delivered by the customer</th>
        <th scope="col" style="border-color: #232323; border-bottom: none; padding: 5px; border-right: 1px solid #232323; border-left: none;"></th>
        <th scope="col" style="border: none; padding: 5px;"></th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border: none; padding: 5px; font-weight: 400;">Samples received</th>
        <th scope="col" style="border-color: #232323; border: none; padding: 5px; border-right: 1px solid #232323;"></th>
        <th scope="col" style="border: none; padding: 5px; font-weight: 400;">Telephone {{$customer->phone}}</th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border: none; padding: 5px; font-weight: 400;">Test start date {{$report->start_date}}</th>
        <th scope="col" style="border-color: #232323; border: none; padding: 5px; border-right: 1px solid #232323;"></th>
        <th scope="col" style="border: none; padding: 5px; font-weight: 400;">E-mail {{$customer->email}}</th>
    </tr>
    <tr>
        <th scope="col" style="border-color: #232323; border: none; padding: 5px; font-weight: 400;">Test end date {{$report->end_date}}</th>
        <th scope="col" style="border-color: #232323; border: none; padding: 5px; border-right: 1px solid #232323;"></th>
        <th scope="col" style="border: none; border-bottom: none; padding: 5px;"></th>
    </tr>
    </thead>
</table>
<p class="ml-3"><b>Test results:</b></p>
<div class="border-left border-right border-bottom">
    <table align="left" cellpadding="0" cellspacing="0" width="100%" style=" page-break-inside: avoid;" >
        <tr>
            <td  class="detail-head border-right border-top border-left border-bottom ml-3 text-left"><b>Test item</b></td>
            <td  class="detail-head border-right border-top border-bottom"><b>Test method</b></td>
            <td  class="detail-head border-right border-top border-bottom"><b>Unit</b></td>
            <td  class="detail-head border-bottom border-top"></td>
            <td  class="detail-head border-bottom border-top"><b>Test result</b></td>
            <td  class="detail-head border-right border-top border-bottom"></td>
        </tr>
        @foreach($tests as $test)
            @if($test->id_customer == $customer->id)
                <tr id="addrowindetail1" class="add-row-in-detail">
                    <td class="detail-content border-left border-bottom border-right ml-3 text-left">{{$test->element->name}}, {{$test->element->symbol}}</td>
                    <td class="detail-content border-left border-bottom border-right text-center">{{$test->method->name}}</td>
                    <td class="detail-content border-left border-bottom border-right text-center">{{$test->unit->name}}</td>
                    <td class="detail-content border-left border-bottom border-right text-center">{{$test->result_one}}</td>
                    <td class="detail-content border-left border-bottom border-right text-center">{{$test->result_two}}</td>
                    <td class="detail-content border-left border-bottom border-right text-center">{{$test->result_three}}</td>
                </tr>
            @endif
        @endforeach
    </table>
</div>
<div class="ml-3" style="position: absolute; bottom: 0;">
    <p style="margin-bottom: 40px;"><b>Notes:</b><br>The test results is valid only for the given sample.</p>
    <p style="margin-bottom: 15px;">/Digitally signed/</p>
    <div>
        <p>Olga Pihl &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Test report date: {{Carbon\Carbon::now()->format('d.m.Y')}}<br>Head of Laboratory<br>Laboratory of Fuels Technology</p>
        <!--<p style="width: 300px; display: inline-block;">Test report date:</p>-->
    </div>
    <p style="margin-bottom: 15px;">Järveküla tee 75<br>Kohtla-Järve<br>Virumaa College</p>
    <p>School of Engineering<br>Tallinn University of Technology</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
