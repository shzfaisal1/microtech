<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Aronox – Admin Bootstrap4 Responsive Webapp Dashboard Templat" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin site template, html admin template,responsive admin template, admin panel template, bootstrap admin panel template, admin template, admin panel template, bootstrap simple admin template premium, simple bootstrap admin template, best bootstrap admin template, simple bootstrap admin template, admin panel template,responsive admin template, bootstrap simple admin template premium"/>

		<!-- Title -->
		<title>Aronox – Admin Bootstrap4 Responsive Webapp Dashboard Templat</title>

		<!--Favicon -->
		<link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>

		<!-- Style css -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

		<!--Horizontal css -->
        <link id="effect" href="{{ asset('ssets/plugins/horizontal-menu/dropdown-effects/fade-up.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/horizontal-menu/horizontal.css') }}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.css') }}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ asset('assets/plugins/iconfonts/icons.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/iconfonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/iconfonts/plugin.css') }}" rel="stylesheet" />

		<!-- Skin css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/skins/hor-skin/hor-skin1.css') }}" />

        <style>
            .invoice-header-img{
	            display: flex;
                justify-content: end;
                align-items: center;
                height: 100%;
            }
            .quotation-head h3{
            	text-align: center;
                margin-bottom: 5px;
                font-weight: 600;
                font-size: 20px;
            }
            .tx-center{
                text-align: center;
            }
            .tx-right{
                text-align: right;
            }
            .vrt-align{
                vertical-align: top;
            }
            .vrt-align-btm{
                vertical-align: bottom;
            }
            .wdt33{
                width: 33.33%;
            }
            .wdt-100{
                width: 100%;
            }
            .wdt-50{
                width: 50%;
            }
            .wdt-47{
                width: 47.5%;
            }
            .hgt-40{
                height: 40px;
            }
            .pd0{
                padding: 0!important;
            }
            .pd-lr-5{
                padding: 0 5px!important;
            }
            .pd-l-20{
                padding-left: 20px!important;
            }
            .bdr-0{
                border: 0 !important;
            }
            .bdr{
                border: 1px solid rgba(67, 87, 133, .2)!important;
            }
            .bdr-top-0{
                border-top: 0!important;
            }
            .bdr-bottom-0{
                border-bottom: 0!important;
            }
        </style>

	</head>

    <body>
        
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Row -->
	                <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="card p-5">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="invoice-header">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><b>Mumbai</b></td>
                                                        <td>:</td>
                                                        <td>022-28812454, 28812644</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Mobile</b></td>
                                                        <td>:</td>
                                                        <td>8779631781/9323141350</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Surat</b></td>
                                                        <td>:</td>
                                                        <td>0261-2556287,2556288</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>E-Mail</b></td>
                                                        <td>:</td>
                                                        <td>info@microtechindia.net</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>:</td>
                                                        <td>sales@microtechindia.net</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Website</b></td>
                                                        <td>:</td>
                                                        <td>www.microtechindia.net</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="invoice-header-img">
                                            <img src="{{asset('assets/images/brand/MT-LOGO-PNG.png')}}" class="header-brand-img desktop-lgo" alt="Aronox logo">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <div class="invoice-header">
                                            <table class="table table-bordered mb-0">
                                                <tr>
                                                    <th class="tx-center"><b>DELIVERY CHALLAN</b></th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-header">
                                            <table class="table table-bordered mb-0">
                                                <tr>
                                                    <th class="tx-center wdt33"><b>Billing Details</b></th>
                                                    <th class="tx-center wdt33"><b>Shipping Details</b></th>
                                                    <th class="tx-center wdt33"><b>Invoice Details</b></th>
                                                </tr>
                                            </table>
                                            <table class="table table-bordered mb-0">
                                                <tr>
                                                    <td class="wdt33 pd0 bdr-0">
                                                        <table class="bdr-0">
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Akshar Balance</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0">Palang Chowk, Kevada Vadi Main Road,Opp Avkar Apartment, Rajkot Gujarat - 360002</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Tel</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Email:</b> aksharbalance12@gmail.com</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Kind Attn:</b> Mr. Harsh</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Contact No:</b> 9408047185</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>GSTIN:</b> 24ACNPV6326P1ZR</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>PAN:</b> ACNPV6326P</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>State Code:</b> 24-Gujarat</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td class="wdt33 pd0">
                                                        <table class="bdr-0">
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Akshar Balance</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0">Palang Chowk, Kevada Vadi Main Road,Opp Avkar Apartment, Rajkot Gujarat - 360002</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Tel</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Email:</b> aksharbalance12@gmail.com</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Kind Attn:</b> Mr. Harsh</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>Contact No:</b> 9408047185</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>GSTIN:</b> 24ACNPV6326P1ZR</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>PAN:</b> ACNPV6326P</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pd-lr-5 bdr-0"><b>State Code:</b> 24-Gujarat</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td class="wdt33 pd0 bdr-0">
                                                        <table class="wdt-100 bdr-0 bdr">
                                                            <tr>
                                                                <td class="bdr-0 pd-lr-5"><b>Invoice No:</b></td>
                                                                <td class="bdr-0 pd-lr-5 tx-right"><b>MIM/25-26/908</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bdr-0 pd-lr-5"><b>Invoice Date:</b></td>
                                                                <td class="bdr-0 pd-lr-5 tx-right">04/08/2025</td>
                                                            </tr>
                                                        </table>
                                                        <table class="wdt-100 bdr">
                                                            <tr>
                                                                <td class="bdr-0 pd-lr-5"><b>PO No:</b></td>
                                                                <td class="bdr-0 pd-lr-5 tx-right">Verbal</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bdr-0 pd-lr-5"><b>PO Date:</b></td>
                                                                <td class="bdr-0 pd-lr-5 tx-right">04/08/2025</td>
                                                            </tr>
                                                        </table>
                                                        <table class="wdt-100 bdr">
                                                            <tr>
                                                                <td class="bdr-0 pd-lr-5"><b>Challan No:</b></td>
                                                                <td class="bdr-0 pd-lr-5 tx-right">MIM/CHN/25-26/686</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bdr-0 pd-lr-5"><b>Challan Date:</b></td>
                                                                <td class="bdr-0 pd-lr-5 tx-right">04/08/2025</td>
                                                            </tr>
                                                        </table>
                                                        <table class="wdt-100">
                                                            <tr>
                                                                <td class="bdr-0 pd-lr-5"><b>Desp. Through:</b></td>
                                                                <td class="bdr-0 pd-lr-5 tx-right">By Courier</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>

                                            <table class="table-bordered wdt-100 bdr pd-lr-5">
                                                <tr>
                                                    <th class="tx-center">S.No</th>
                                                    <th class="pd-lr-5">Particular of Items</th>
                                                    <th class="tx-center">HSN/SAC</th>
                                                    <th class="tx-center">Qty</th>
                                                    <th class="tx-center">Rate(Rs.)</th>
                                                    <th class="tx-right">Amount</th>
                                                </tr>
                                                <tr>
                                                    <td class="tx-center">1</td>
                                                    <td class="pd-lr-5">Make : Sartorius Balance/s</td>
                                                    <td class="tx-center">90160020</td>
                                                    <td class="tx-center">8</td>
                                                    <td class="tx-center">60000.00</td>
                                                    <td class="tx-right">480000.00</td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="wdt-100 table-bordered">
                                            <tr>
                                                <td class="pd0 wdt-47 vrt-align">
                                                    <table class="wdt-100">
                                                        <tr>
                                                            <td class="bdr-0 pd-lr-5"><span>LUT/ARN No :</span> 555</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-lr-5"><span>LUT/Note :</span> 555</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-lr-5"><span>PAN No :</span> AAFPL7429K</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-lr-5"><span>GSTIN :</span> 27AAFPL7429K1ZB</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="pd0 bdr-0 wdt-50">
                                                    <table class="wdt-100">
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5 bdr-top-0"><b>Total Amount</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right bdr-top-0">555</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5"><b>Packing /Freight</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right">0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5"><b>Discount</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right">0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5"><b>Taxable Amount</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right">0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5"><b>IGST@18%</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right">86400.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5 bdr-bottom-0"><b>Total</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right bdr-bottom-0">566400.00</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <table class="wdt-100 table-bordered">
                                            <tr>
                                                <td class="pd0 wdt-47 vrt-align">
                                                    <table class="wdt-100">
                                                        <tr>
                                                            <td class="bdr-0 pd-lr-5"><span>Rupees  :</span> Five Lakh Sixty Six Thousand Four Hundred Only.</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="pd0 bdr-0 wdt-50">
                                                    <table class="wdt-100">
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5 bdr-top-0"><b>Round off</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right bdr-top-0">0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="wdt-50 pd-lr-5 bdr-bottom-0"><b>Grand Total</b> </td>
                                                            <td class="wdt-50 pd-lr-5 tx-right bdr-bottom-0">566400.00</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table-bordered wdt-100">
                                            <tr>
                                                <td class="wdt-47">
                                                    <table class="wdt-100">
                                                        <tr>
                                                            <td class="bdr-0 pd-lr-5"><b>Terms & Conditions</b> :</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-l-20">1. Goods once sold will not be taken back.</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-l-20">2. Please return the duplicate copy of the challan duly signed by you.</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-l-20">2. Please return the duplicate copy of the challan duly signed by you.</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-l-20">2. Please return the duplicate copy of the challan duly signed by you.</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bdr-0 pd-l-20">2. Please return the duplicate copy of the challan duly signed by you.</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="wdt-50 vrt-align-btm">
                                                    <table class="wdt-100">
                                                        <tr>
                                                            <td class="tx-right pd-lr-5 bdr-0">For Microtech Instruments Corporation</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tx-right pd-lr-5 hgt-40 bdr-0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tx-right pd-lr-5 bdr-0">Authorized Signatory</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <table>
                                            <tr>
                                                <td><b>Microtech Instruments Corporation</b></td>
                                            </tr>
                                            <tr>
                                                <td>320, Prestige Industrial Estate, Baudi Cross Lane, Off Marve Road, Malad (W), Mumbai - 400 064</td>
                                            </tr>
                                            <tr>
                                                <td>101/102, Mavani Shopping Centre, Sardar Chowk, Mini Bazar, Varachha Road, Surat - 395 006</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!-- section-wrapper -->
                        </div>
                    </div>
	                <!-- End Row -->
                </div>
            </div>
        </div>

    </body>
</html>