@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Test";
@endphp
@push('styles')
    <link rel="stylesheet" href=" https://printjs-4de6.kxcdn.com/print.min.css">
    <style>
    </style>
@endpush
@section('main')

    <livewire:client.pages.build-costs>

@endsection

@push('script')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
            <script>

                $(document).ready(function () {
                    var form = $('#toolBuild'),
                        cache_width = form.width(),
                        a4 = [595.28, 1000],
                        logoUrl = "{{asset('images/logos/logo.png')}}",
                        companyName = 'NT - GROUP';

                    $('#printBuildButton').on('click', function (event) {
                        event.preventDefault();
                        generatePDF();
                    });

                    function generatePDF() {
                        getCanvas().then(function (canvas) {
                            var img = canvas.toDataURL("image/png"),
                                doc = new jsPDF({
                                    unit: 'px',
                                    format: 'a4',
                                    orientation: 'portrait',
                                });

                            // Add logo
                            getBase64FromImageUrl(logoUrl).then(function (logoBase64) {
                                doc.addImage(logoBase64, 'PNG', 20, 20, 50, 50);

                                // Set font size and calculate width of the company name
                                doc.setFontSize(14);
                                var companyNameWidth = doc.getStringUnitWidth(companyName) * doc.internal.getFontSize();

                                // Add company name to the right
                                var companyNameX = doc.internal.pageSize.width - 20 - companyNameWidth;
                                doc.text(companyName, companyNameX, 60);

                                // Add the captured content
                                doc.addImage(img, 'JPEG', 20, 120);

                                // Trigger download
                                var blob = doc.output('blob');
                                var url = URL.createObjectURL(blob);
                                var link = document.createElement('a');
                                link.href = url;
                                link.download = 'bao-cao.pdf';
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);

                                // Show the hidden elements after download
                                form.width(cache_width);
                                form.find('.hide-print').show();
                            });
                        });
                    }

                    function getCanvas() {
                        form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                        form.find('.hide-print').hide();
                        return html2canvas(form, {
                            imageTimeout: 5000,
                            removeContainer: true,
                            scale: 2
                        });
                    }

                    function getBase64FromImageUrl(url) {
                        return fetch(url)
                            .then(response => response.blob())
                            .then(blob => new Promise((resolve, reject) => {
                                const reader = new FileReader();
                                reader.onloadend = () => resolve(reader.result);
                                reader.onerror = reject;
                                reader.readAsDataURL(blob);
                            }));
                    }
                });
            </script>
@endpush
@push('css')

    <style>
		.section-form_label{
			color:#0a3c6d ;
			font-weight:600;
		}
		.button-42 {
			background-color: #c99736;
			background-image: linear-gradient(-180deg, #c99736, #c99736);
			border-radius: 6px;
			box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
			color: #FFFFFF;
			cursor: pointer;
			display: inline-block;
			font-family: Inter,-apple-system,system-ui,Roboto,"Helvetica Neue",Arial,sans-serif;
			height: 40px;
			line-height: 40px;
			outline: 0;
			overflow: hidden;
			padding: 0 20px;
			pointer-events: auto;
			position: relative;
			text-align: center;
			touch-action: manipulation;
			user-select: none;
			-webkit-user-select: none;
			vertical-align: top;
			white-space: nowrap;

			z-index: 9;
			border: 0;
			transition: box-shadow .2s;
		}

		.button-42:hover {
			box-shadow: rgba(253, 76, 0, 0.5) 0 3px 8px;
		}
		 .d-flex.justify-content-center ul {
			 list-style-type: none;
			 padding: 0;
		 }

		.d-flex.justify-content-center ul li {
			font-size: 14px;
		}


		.form-control:disabled, .form-control[readonly] {
			background-color: white !important;
            text-align: center;
            border: 0 !important;
		}
    </style>

@endpush