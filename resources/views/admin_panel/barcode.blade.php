<!doctype html>
<html lang="en">
@include('include.panel_head')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Generar Barcode en Laravel - Edinsoncs.com</title>
    <style type="text/css">
        @media print {
            body * {
                visibility: hidden;
            }

            .div2 * {
                visibility: visible;
            }

            .div2 {
                position: absolute;
                top: 40px;
                left: 30px;
            }
        }
    </style>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        td,
        th,
        tr,
        table {

            border-collapse: collapse;
        }

        td.producto,
        th.producto {
            width: 75px;
            max-width: 75px;
        }

        td.cantidad,
        th.cantidad {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.precio,
        th.precio {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .oculto-impresion,
            .oculto-impresion * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        @foreach($productos as $prod)
        <div class="ticket text-center printableArea">
            <table>
                <tbody>
                    <tr>
                        <td colspan="4">
                            <p>PESCADERIA SOLEMAN</p>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="3">
                            <div>{!! DNS2D::getBarcodeSVG($prod->codigo, 'QRCODE',4,4) !!}</div>{{$prod->codigo}}
                        </td>
                        <td rowspan="3">
                            <p>{{$prod->nombre}}<br>{{$prod->descripcion}}<br> {{ date('d/m/Y  H:i:s') }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
        <br><br>
        <div class="ticket text-center">
            <button id="back" class="btn btn-success" onclick="window.history.back();"> <span><i class="fa fa-print"></i> Regresar</span> </button>
            <button id="print" class="btn btn-danger" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
        </div>


    </div>
    @include('include.panel_footer')
    <script>
        $(document).ready(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
    </script>
</body>

</html>