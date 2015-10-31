<?php
 
App::import('Vendor','dompdf');
 

 $html= <<<EOD

 
 <table align="center">
 <tr>
 
 <td><img src="http://localhost/polychem/app/webroot/img/Yeti.jpg"/><h1>YETI POLYCHEM PVT LTD</h1></td>
 </tr>
 <tr>
 <td><h5>Calender Raw Material Monthly Consumption-$date</h5></td>
 
 </tr>
 </table>
 <br/>
 <br/>
 <table border="1" width="50%">
 <tr>
    <td colspan="2">Consumption</td>
 </tr>
 <tr>
    <td>Today</td>
    
 
 
EOD;

foreach ( $totaltoday as $tottoday ){

   $html .= '<td>'.number_format($tottoday['0']['total'],2).'</td></tr>';
   
};
foreach ( $totaltoday as $tottoday ){

   $html .= '<tr><td>To Month</td><td>'.number_format($tottoday['0']['total'],2).'</td></tr>';
   
};
foreach ( $totaltoday as $tottoday ){

   $html .= '<tr><td>To Year</td><td>'.number_format($tottoday['0']['total'],2).'</td></tr></table>';
   
};

 $pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();
$html = <<<EOD


<table cellspacing="0" cellpadding="0" border="1">
    <tr bgcolor="grey" color="white">
        <td>Materials</td>
        <td>Consumption</td>
    </tr>

</table>

EOD;

echo $date;
foreach ( $mixingraws as $tot ){
   $html .= '<table border="1"><tr><td>'.$tot['consumption_stock']['material_id'].'</td><td>'.number_format($tot['0']['sum'],2).'</td></tr></table>';
};
foreach ( $rawmaterial as $totalraws ){
   $html .= '<table><tr bgcolor="grey" color="white"><td>Total</td><td>'.number_format($totalraws['0']['totalmaterial'],2).'</td></tr></table>';
};


foreach ( $mixingscraps as $scp ){
   $html .= '<table><tr><td>'.$scp['consumption_stock']['material_id'].'</td><td>'.$scp['0']['sum'].'</td></tr></table>';
   
};
foreach ( $scraptotal as $totscp ){
   $html .= '<table><tr bgcolor="grey" color="white"><td>Scrap Total</td><td>'.number_format($totscp['0']['scrap_total'],2).'</td></tr></table>';
   
};
foreach ( $totaltoday as $tottoday ){

   $html .= '<table><tr bgcolor="grey" color="white"><td>Grand Total</td><td>'.number_format($tottoday['0']['total'],2).'</td></tr></table>';
   
};



 
$pdf->writeHTML($html, true, false, true, false, '');
 

$pdf->AddPage();
$html = <<<EOD


 <table align="center">
 <tr>
 
 <td><img src="http://localhost/polychem/app/webroot/img/Yeti.jpg"/><h1>YETI POLYCHEM PVT LTD</h1></td>
 </tr>
 <tr>
 <td><h5>Calender Raw Material Monthly Consumption-$date</h5></td>
 
 </tr>
 </table>
 <br/>
 <br/>
 

EOD;
$html .= '<style>

article, aside, details, figcaption, figure, footer, header, hgroup, main, nav, section, summary {
    display: block;
}
audio, canvas, video {
    display: inline-block;
}
audio:not([controls]) {
    display: none;
    height: 0;
}
[hidden] {
    display: none;
}
html {
    font-family: sans-serif;
}
body {
    margin: 0;
}
a:focus {
    outline: thin dotted;
}
a:active, a:hover {
    outline: 0 none;
}
h1 {
    font-size: 2em;
    margin: 0.67em 0;
}
abbr[title] {
    border-bottom: 1px dotted;
}
b, strong {
    font-weight: bold;
}
dfn {
    font-style: italic;
}
hr {
    box-sizing: content-box;
    height: 0;
}
mark {
    background: #ff0 none repeat scroll 0 0;
    color: #000;
}
code, kbd, pre, samp {
    font-family: monospace,serif;
    font-size: 1em;
}
pre {
    white-space: pre-wrap;
}
q {
    quotes: "“" "”" "‘" "’";
}
small {
    font-size: 80%;
}
sub, sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
}
sup {
    top: -0.5em;
}
sub {
    bottom: -0.25em;
}
img {
    border: 0 none;
}
svg:not(:root) {
    overflow: hidden;
}
figure {
    margin: 0;
}
fieldset {
    border: 1px solid #c0c0c0;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em;
}
legend {
    border: 0 none;
    padding: 0;
}
button, input, select, textarea {
    font-family: inherit;
    font-size: 100%;
    margin: 0;
}
button, input {
    line-height: normal;
}
button, select {
    text-transform: none;
}
button, html input[type="button"], input[type="reset"], input[type="submit"] {
    cursor: pointer;
}
button[disabled], html input[disabled] {
    cursor: default;
}
input[type="checkbox"], input[type="radio"] {
    box-sizing: border-box;
    padding: 0;
}
input[type="search"] {
    box-sizing: content-box;
}
button::-moz-focus-inner, input::-moz-focus-inner {
    border: 0 none;
    padding: 0;
}
textarea {
    overflow: auto;
    vertical-align: top;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
@media print {
* {
    background: transparent none repeat scroll 0 0 !important;
    box-shadow: none !important;
    color: #000 !important;
    text-shadow: none !important;
}
a, a:visited {
    text-decoration: underline;
}
a[href]::after {
    content: " (" attr(href) ")";
}
abbr[title]::after {
    content: " (" attr(title) ")";
}
.ir a::after, a[href^="javascript:"]::after, a[href^="#"]::after {
    content: "";
}
pre, blockquote {
    border: 1px solid #999;
    page-break-inside: avoid;
}
thead {
    display: table-header-group;
}
tr, img {
    page-break-inside: avoid;
}
img {
    max-width: 100% !important;
}
@page {
    margin: 2cm 0.5cm;
}
p, h2, h3 {
    orphans: 3;
    widows: 3;
}
h2, h3 {
    page-break-after: avoid;
}
.navbar {
    display: none;
}
.table td, .table th {
    background-color: #fff !important;
}
.btn > .caret, .dropup > .btn > .caret {
    border-top-color: #000 !important;
}
.label {
    border: 1px solid #000;
}
.table {
    border-collapse: collapse !important;
}
.table-bordered th, .table-bordered td {
    border: 1px solid #ddd !important;
}
}
*, *::before, *::after {
    box-sizing: border-box;
}
html {
    font-size: 62.5%;
}
body {
    background-color: #fff;
    color: #333;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 40px;
    line-height: 1.42857;
}
input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
button, input, select[multiple], textarea {
    background-image: none;
}
a {
    color: #428bca;
    text-decoration: none;
}
a:hover, a:focus {
    color: #2a6496;
    text-decoration: underline;
}
a:focus {
    outline: thin dotted #333;
    outline-offset: -2px;
}
img {
    vertical-align: middle;
}
.img-responsive {
    display: block;
    height: auto;
    max-width: 100%;
}
.img-rounded {
    border-radius: 6px;
}
.img-thumbnail {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: inline-block;
    height: auto;
    line-height: 1.42857;
    max-width: 100%;
    padding: 4px;
    transition: all 0.2s ease-in-out 0s;
}
.img-circle {
    border-radius: 50%;
}
hr {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #eee -moz-use-text-color -moz-use-text-color;
    border-image: none;
    border-style: solid none none;
    border-width: 1px 0 0;
    margin-bottom: 20px;
    margin-top: 20px;
}
.sr-only {
    border: 0 none;
    clip: rect(0px, 0px, 0px, 0px);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}
p {
    margin: 0 0 10px;
}
.lead {
    font-size: 16.1px;
    font-weight: 200;
    line-height: 1.4;
    margin-bottom: 20px;
}
@media (min-width: 768px) {
.lead {
    font-size: 21px;
}
}
small {
    font-size: 85%;
}
cite {
    font-style: normal;
}
.text-muted {
    color: #999;
}
.text-primary {
    color: #428bca;
}
.text-warning {
    color: #c09853;
}
.text-danger {
    color: #b94a48;
}
.text-success {
    color: #468847;
}
.text-info {
    color: #3a87ad;
}
.text-left {
    text-align: left;
}
.text-right {
    text-align: right;
}
.text-center {
    text-align: center;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight: 500;
    line-height: 1.1;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small, .h1 small, .h2 small, .h3 small, .h4 small, .h5 small, .h6 small {
    color: #999;
    font-weight: normal;
    line-height: 1;
}
h1, h2, h3 {
    margin-bottom: 10px;
    margin-top: 20px;
}
h4, h5, h6 {
    margin-bottom: 10px;
    margin-top: 10px;
}
h1, .h1 {
    font-size: 36px;
}
h2, .h2 {
    font-size: 30px;
}
h3, .h3 {
    font-size: 24px;
}
h4, .h4 {
    font-size: 18px;
}
h5, .h5 {
    font-size: 14px;
}
h6, .h6 {
    font-size: 12px;
}
h1 small, .h1 small {
    font-size: 24px;
}
h2 small, .h2 small {
    font-size: 18px;
}
h3 small, .h3 small, h4 small, .h4 small {
    font-size: 14px;
}
.page-header {
    border-bottom: 1px solid #eee;
    margin: 40px 0 20px;
    padding-bottom: 9px;
}
ul, ol {
    margin-bottom: 10px;
    margin-top: 0;
}
ul ul, ol ul, ul ol, ol ol {
    margin-bottom: 0;
}
.list-unstyled {
    list-style: outside none none;
    padding-left: 0;
}
.list-inline {
    list-style: outside none none;
    padding-left: 0;
}
.list-inline > li {
    display: inline-block;
    padding-left: 5px;
    padding-right: 5px;
}
dl {
    margin-bottom: 20px;
}
dt, dd {
    line-height: 1.42857;
}
dt {
    font-weight: bold;
}
dd {
    margin-left: 0;
}
@media (min-width: 768px) {
.dl-horizontal dt {
    clear: left;
    float: left;
    overflow: hidden;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 160px;
}
.dl-horizontal dd {
    margin-left: 180px;
}
.dl-horizontal dd::before, .dl-horizontal dd::after {
    content: " ";
    display: table;
}
.dl-horizontal dd::after {
    clear: both;
}
.dl-horizontal dd::before, .dl-horizontal dd::after {
    content: " ";
    display: table;
}
.dl-horizontal dd::after {
    clear: both;
}
}
abbr[title], abbr[data-original-title] {
    border-bottom: 1px dotted #999;
    cursor: help;
}
abbr.initialism {
    font-size: 90%;
    text-transform: uppercase;
}
blockquote {
    border-left: 5px solid #eee;
    margin: 0 0 20px;
    padding: 10px 20px;
}
blockquote p {
    font-size: 17.5px;
    font-weight: 300;
    line-height: 1.25;
}
blockquote p:last-child {
    margin-bottom: 0;
}
blockquote small {
    color: #999;
    display: block;
    line-height: 1.42857;
}
blockquote small::before {
    content: "— ";
}
blockquote.pull-right {
    border-left: 0 none;
    border-right: 5px solid #eee;
    padding-left: 0;
    padding-right: 15px;
}
blockquote.pull-right p, blockquote.pull-right small {
    text-align: right;
}
blockquote.pull-right small::before {
    content: "";
}
blockquote.pull-right small::after {
    content: " —";
}
q::before, q::after, blockquote::before, blockquote::after {
    content: "";
}
address {
    display: block;
    font-style: normal;
    line-height: 1.42857;
    margin-bottom: 20px;
}
code, pre {
    font-family: Monaco,Menlo,Consolas,"Courier New",monospace;
}
code {
    background-color: #f9f2f4;
    border-radius: 4px;
    color: #c7254e;
    font-size: 90%;
    padding: 2px 4px;
    white-space: nowrap;
}
pre {
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #333;
    display: block;
    font-size: 13px;
    line-height: 1.42857;
    margin: 0 0 10px;
    padding: 9.5px;
    word-break: break-all;
    word-wrap: break-word;
}
pre.prettyprint {
    margin-bottom: 20px;
}
pre code {
    background-color: transparent;
    border: 0 none;
    color: inherit;
    font-size: inherit;
    padding: 0;
    white-space: pre-wrap;
}
.pre-scrollable {
    max-height: 340px;
    overflow-y: scroll;
}
.container {
    margin-left: auto;
    margin-right: auto;
    padding-left: 15px;
    padding-right: 15px;
}
.container::before, .container::after {
    content: " ";
    display: table;
}
.container::after {
    clear: both;
}
.container::before, .container::after {
    content: " ";
    display: table;
}
.container::after {
    clear: both;
}
.row {
    margin-left: -15px;
    margin-right: -15px;
}
.row::before, .row::after {
    content: " ";
    display: table;
}
.row::after {
    clear: both;
}
.row::before, .row::after {
    content: " ";
    display: table;
}
.row::after {
    clear: both;
}
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    position: relative;
}
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11 {
    float: left;
}
.col-xs-1 {
    width: 8.33333%;
}
.col-xs-2 {
    width: 16.6667%;
}
.col-xs-3 {
    width: 25%;
}
.col-xs-4 {
    width: 33.3333%;
}
.col-xs-5 {
    width: 41.6667%;
}
.col-xs-6 {
    width: 50%;
}
.col-xs-7 {
    width: 58.3333%;
}
.col-xs-8 {
    width: 66.6667%;
}
.col-xs-9 {
    width: 75%;
}
.col-xs-10 {
    width: 83.3333%;
}
.col-xs-11 {
    width: 91.6667%;
}
.col-xs-12 {
    width: 100%;
}
@media (min-width: 768px) {
.container {
    max-width: 750px;
}
.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11 {
    float: left;
}
.col-sm-1 {
    width: 8.33333%;
}
.col-sm-2 {
    width: 16.6667%;
}
.col-sm-3 {
    width: 25%;
}
.col-sm-4 {
    width: 33.3333%;
}
.col-sm-5 {
    width: 41.6667%;
}
.col-sm-6 {
    width: 50%;
}
.col-sm-7 {
    width: 58.3333%;
}
.col-sm-8 {
    width: 66.6667%;
}
.col-sm-9 {
    width: 75%;
}
.col-sm-10 {
    width: 83.3333%;
}
.col-sm-11 {
    width: 91.6667%;
}
.col-sm-12 {
    width: 100%;
}
.col-sm-push-1 {
    left: 8.33333%;
}
.col-sm-push-2 {
    left: 16.6667%;
}
.col-sm-push-3 {
    left: 25%;
}
.col-sm-push-4 {
    left: 33.3333%;
}
.col-sm-push-5 {
    left: 41.6667%;
}
.col-sm-push-6 {
    left: 50%;
}
.col-sm-push-7 {
    left: 58.3333%;
}
.col-sm-push-8 {
    left: 66.6667%;
}
.col-sm-push-9 {
    left: 75%;
}
.col-sm-push-10 {
    left: 83.3333%;
}
.col-sm-push-11 {
    left: 91.6667%;
}
.col-sm-pull-1 {
    right: 8.33333%;
}
.col-sm-pull-2 {
    right: 16.6667%;
}
.col-sm-pull-3 {
    right: 25%;
}
.col-sm-pull-4 {
    right: 33.3333%;
}
.col-sm-pull-5 {
    right: 41.6667%;
}
.col-sm-pull-6 {
    right: 50%;
}
.col-sm-pull-7 {
    right: 58.3333%;
}
.col-sm-pull-8 {
    right: 66.6667%;
}
.col-sm-pull-9 {
    right: 75%;
}
.col-sm-pull-10 {
    right: 83.3333%;
}
.col-sm-pull-11 {
    right: 91.6667%;
}
.col-sm-offset-1 {
    margin-left: 8.33333%;
}
.col-sm-offset-2 {
    margin-left: 16.6667%;
}
.col-sm-offset-3 {
    margin-left: 25%;
}
.col-sm-offset-4 {
    margin-left: 33.3333%;
}
.col-sm-offset-5 {
    margin-left: 41.6667%;
}
.col-sm-offset-6 {
    margin-left: 50%;
}
.col-sm-offset-7 {
    margin-left: 58.3333%;
}
.col-sm-offset-8 {
    margin-left: 66.6667%;
}
.col-sm-offset-9 {
    margin-left: 75%;
}
.col-sm-offset-10 {
    margin-left: 83.3333%;
}
.col-sm-offset-11 {
    margin-left: 91.6667%;
}
}
@media (min-width: 992px) {
.container {
    max-width: 970px;
}
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11 {
    float: left;
}
.col-md-1 {
    width: 8.33333%;
}
.col-md-2 {
    width: 16.6667%;
}
.col-md-3 {
    width: 25%;
}
.col-md-4 {
    width: 33.3333%;
}
.col-md-5 {
    width: 41.6667%;
}
.col-md-6 {
    width: 50%;
}
.col-md-7 {
    width: 58.3333%;
}
.col-md-8 {
    width: 66.6667%;
}
.col-md-9 {
    width: 75%;
}
.col-md-10 {
    width: 83.3333%;
}
.col-md-11 {
    width: 91.6667%;
}
.col-md-12 {
    width: 100%;
}
.col-md-push-0 {
    left: auto;
}
.col-md-push-1 {
    left: 8.33333%;
}
.col-md-push-2 {
    left: 16.6667%;
}
.col-md-push-3 {
    left: 25%;
}
.col-md-push-4 {
    left: 33.3333%;
}
.col-md-push-5 {
    left: 41.6667%;
}
.col-md-push-6 {
    left: 50%;
}
.col-md-push-7 {
    left: 58.3333%;
}
.col-md-push-8 {
    left: 66.6667%;
}
.col-md-push-9 {
    left: 75%;
}
.col-md-push-10 {
    left: 83.3333%;
}
.col-md-push-11 {
    left: 91.6667%;
}
.col-md-pull-0 {
    right: auto;
}
.col-md-pull-1 {
    right: 8.33333%;
}
.col-md-pull-2 {
    right: 16.6667%;
}
.col-md-pull-3 {
    right: 25%;
}
.col-md-pull-4 {
    right: 33.3333%;
}
.col-md-pull-5 {
    right: 41.6667%;
}
.col-md-pull-6 {
    right: 50%;
}
.col-md-pull-7 {
    right: 58.3333%;
}
.col-md-pull-8 {
    right: 66.6667%;
}
.col-md-pull-9 {
    right: 75%;
}
.col-md-pull-10 {
    right: 83.3333%;
}
.col-md-pull-11 {
    right: 91.6667%;
}
.col-md-offset-0 {
    margin-left: 0;
}
.col-md-offset-1 {
    margin-left: 8.33333%;
}
.col-md-offset-2 {
    margin-left: 16.6667%;
}
.col-md-offset-3 {
    margin-left: 25%;
}
.col-md-offset-4 {
    margin-left: 33.3333%;
}
.col-md-offset-5 {
    margin-left: 41.6667%;
}
.col-md-offset-6 {
    margin-left: 50%;
}
.col-md-offset-7 {
    margin-left: 58.3333%;
}
.col-md-offset-8 {
    margin-left: 66.6667%;
}
.col-md-offset-9 {
    margin-left: 75%;
}
.col-md-offset-10 {
    margin-left: 83.3333%;
}
.col-md-offset-11 {
    margin-left: 91.6667%;
}
}
@media (min-width: 1200px) {
.container {
    max-width: 1170px;
}
.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11 {
    float: left;
}
.col-lg-1 {
    width: 8.33333%;
}
.col-lg-2 {
    width: 16.6667%;
}
.col-lg-3 {
    width: 25%;
}
.col-lg-4 {
    width: 33.3333%;
}
.col-lg-5 {
    width: 41.6667%;
}
.col-lg-6 {
    width: 50%;
}
.col-lg-7 {
    width: 58.3333%;
}
.col-lg-8 {
    width: 66.6667%;
}
.col-lg-9 {
    width: 75%;
}
.col-lg-10 {
    width: 83.3333%;
}
.col-lg-11 {
    width: 91.6667%;
}
.col-lg-12 {
    width: 100%;
}
.col-lg-push-0 {
    left: auto;
}
.col-lg-push-1 {
    left: 8.33333%;
}
.col-lg-push-2 {
    left: 16.6667%;
}
.col-lg-push-3 {
    left: 25%;
}
.col-lg-push-4 {
    left: 33.3333%;
}
.col-lg-push-5 {
    left: 41.6667%;
}
.col-lg-push-6 {
    left: 50%;
}
.col-lg-push-7 {
    left: 58.3333%;
}
.col-lg-push-8 {
    left: 66.6667%;
}
.col-lg-push-9 {
    left: 75%;
}
.col-lg-push-10 {
    left: 83.3333%;
}
.col-lg-push-11 {
    left: 91.6667%;
}
.col-lg-pull-0 {
    right: auto;
}
.col-lg-pull-1 {
    right: 8.33333%;
}
.col-lg-pull-2 {
    right: 16.6667%;
}
.col-lg-pull-3 {
    right: 25%;
}
.col-lg-pull-4 {
    right: 33.3333%;
}
.col-lg-pull-5 {
    right: 41.6667%;
}
.col-lg-pull-6 {
    right: 50%;
}
.col-lg-pull-7 {
    right: 58.3333%;
}
.col-lg-pull-8 {
    right: 66.6667%;
}
.col-lg-pull-9 {
    right: 75%;
}
.col-lg-pull-10 {
    right: 83.3333%;
}
.col-lg-pull-11 {
    right: 91.6667%;
}
.col-lg-offset-0 {
    margin-left: 0;
}
.col-lg-offset-1 {
    margin-left: 8.33333%;
}
.col-lg-offset-2 {
    margin-left: 16.6667%;
}
.col-lg-offset-3 {
    margin-left: 25%;
}
.col-lg-offset-4 {
    margin-left: 33.3333%;
}
.col-lg-offset-5 {
    margin-left: 41.6667%;
}
.col-lg-offset-6 {
    margin-left: 50%;
}
.col-lg-offset-7 {
    margin-left: 58.3333%;
}
.col-lg-offset-8 {
    margin-left: 66.6667%;
}
.col-lg-offset-9 {
    margin-left: 75%;
}
.col-lg-offset-10 {
    margin-left: 83.3333%;
}
.col-lg-offset-11 {
    margin-left: 91.6667%;
}
}
table {
    background-color: transparent;
    max-width: 100%;
}
th {
    text-align: left;
}
.table {
    margin-bottom: 20px;
    width: 100%;
}
.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
    border-top: 1px solid #ddd;
    line-height: 1.42857;
    padding: 8px;
    vertical-align: top;
}
.table thead > tr > th {
    border-bottom: 2px solid #ddd;
    vertical-align: bottom;
}
.table caption + thead tr:first-child th, .table colgroup + thead tr:first-child th, .table thead:first-child tr:first-child th, .table caption + thead tr:first-child td, .table colgroup + thead tr:first-child td, .table thead:first-child tr:first-child td {
    border-top: 0 none;
}
.table tbody + tbody {
    border-top: 2px solid #ddd;
}
.table .table {
    background-color: #fff;
}
.table-condensed thead > tr > th, .table-condensed tbody > tr > th, .table-condensed tfoot > tr > th, .table-condensed thead > tr > td, .table-condensed tbody > tr > td, .table-condensed tfoot > tr > td {
    padding: 5px;
}
.table-bordered {
    border: 1px solid #ddd;
}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
.table-bordered > thead > tr > th, .table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}
.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
    background-color: #f9f9f9;
}
.table-hover > tbody > tr:hover > td, .table-hover > tbody > tr:hover > th {
    background-color: #f5f5f5;
}
table col[class*="col-"] {
    display: table-column;
    float: none;
}
table td[class*="col-"], table th[class*="col-"] {
    display: table-cell;
    float: none;
}
.table > thead > tr > td.active, .table > tbody > tr > td.active, .table > tfoot > tr > td.active, .table > thead > tr > th.active, .table > tbody > tr > th.active, .table > tfoot > tr > th.active, .table > thead > tr.active > td, .table > tbody > tr.active > td, .table > tfoot > tr.active > td, .table > thead > tr.active > th, .table > tbody > tr.active > th, .table > tfoot > tr.active > th {
    background-color: #f5f5f5;
}
.table > thead > tr > td.success, .table > tbody > tr > td.success, .table > tfoot > tr > td.success, .table > thead > tr > th.success, .table > tbody > tr > th.success, .table > tfoot > tr > th.success, .table > thead > tr.success > td, .table > tbody > tr.success > td, .table > tfoot > tr.success > td, .table > thead > tr.success > th, .table > tbody > tr.success > th, .table > tfoot > tr.success > th {
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.table-hover > tbody > tr > td.success:hover, .table-hover > tbody > tr > th.success:hover, .table-hover > tbody > tr.success:hover > td {
    background-color: #d0e9c6;
    border-color: #c9e2b3;
}
.table > thead > tr > td.danger, .table > tbody > tr > td.danger, .table > tfoot > tr > td.danger, .table > thead > tr > th.danger, .table > tbody > tr > th.danger, .table > tfoot > tr > th.danger, .table > thead > tr.danger > td, .table > tbody > tr.danger > td, .table > tfoot > tr.danger > td, .table > thead > tr.danger > th, .table > tbody > tr.danger > th, .table > tfoot > tr.danger > th {
    background-color: #f2dede;
    border-color: #eed3d7;
}
.table-hover > tbody > tr > td.danger:hover, .table-hover > tbody > tr > th.danger:hover, .table-hover > tbody > tr.danger:hover > td {
    background-color: #ebcccc;
    border-color: #e6c1c7;
}
.table > thead > tr > td.warning, .table > tbody > tr > td.warning, .table > tfoot > tr > td.warning, .table > thead > tr > th.warning, .table > tbody > tr > th.warning, .table > tfoot > tr > th.warning, .table > thead > tr.warning > td, .table > tbody > tr.warning > td, .table > tfoot > tr.warning > td, .table > thead > tr.warning > th, .table > tbody > tr.warning > th, .table > tfoot > tr.warning > th {
    background-color: #fcf8e3;
    border-color: #fbeed5;
}
.table-hover > tbody > tr > td.warning:hover, .table-hover > tbody > tr > th.warning:hover, .table-hover > tbody > tr.warning:hover > td {
    background-color: #faf2cc;
    border-color: #f8e5be;
}
@media (max-width: 768px) {
.table-responsive {
    border: 1px solid #ddd;
    margin-bottom: 15px;
    overflow-x: scroll;
    overflow-y: hidden;
    width: 100%;
}
.table-responsive > .table {
    background-color: #fff;
    margin-bottom: 0;
}
.table-responsive > .table > thead > tr > th, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tfoot > tr > td {
    white-space: nowrap;
}
.table-responsive > .table-bordered {
    border: 0 none;
}
.table-responsive > .table-bordered > thead > tr > th:first-child, .table-responsive > .table-bordered > tbody > tr > th:first-child, .table-responsive > .table-bordered > tfoot > tr > th:first-child, .table-responsive > .table-bordered > thead > tr > td:first-child, .table-responsive > .table-bordered > tbody > tr > td:first-child, .table-responsive > .table-bordered > tfoot > tr > td:first-child {
    border-left: 0 none;
}
.table-responsive > .table-bordered > thead > tr > th:last-child, .table-responsive > .table-bordered > tbody > tr > th:last-child, .table-responsive > .table-bordered > tfoot > tr > th:last-child, .table-responsive > .table-bordered > thead > tr > td:last-child, .table-responsive > .table-bordered > tbody > tr > td:last-child, .table-responsive > .table-bordered > tfoot > tr > td:last-child {
    border-right: 0 none;
}
.table-responsive > .table-bordered > thead > tr:last-child > th, .table-responsive > .table-bordered > tbody > tr:last-child > th, .table-responsive > .table-bordered > tfoot > tr:last-child > th, .table-responsive > .table-bordered > thead > tr:last-child > td, .table-responsive > .table-bordered > tbody > tr:last-child > td, .table-responsive > .table-bordered > tfoot > tr:last-child > td {
    border-bottom: 0 none;
}
}
fieldset {
    border: 0 none;
    margin: 0;
    padding: 0;
}
legend {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: -moz-use-text-color -moz-use-text-color #e5e5e5;
    border-image: none;
    border-style: none none solid;
    border-width: 0 0 1px;
    color: #333;
    display: block;
    font-size: 21px;
    line-height: inherit;
    margin-bottom: 20px;
    padding: 0;
    width: 100%;
}
label {
    display: inline-block;
    font-weight: bold;
    margin-bottom: 5px;
}
input[type="search"] {
    box-sizing: border-box;
}
input[type="radio"], input[type="checkbox"] {
    line-height: normal;
    margin: 4px 0 0;
}
input[type="file"] {
    display: block;
}
select[multiple], select[size] {
    height: auto;
}
select optgroup {
    font-family: inherit;
    font-size: inherit;
    font-style: inherit;
}
input[type="file"]:focus, input[type="radio"]:focus, input[type="checkbox"]:focus {
    outline: thin dotted #333;
    outline-offset: -2px;
}
.form-control:-moz-placeholder {
    color: #999;
}
.form-control::-moz-placeholder {
    color: #999;
}
.form-control {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555;
    display: block;
    font-size: 14px;
    height: 34px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    vertical-align: middle;
    width: 100%;
}
.form-control:focus {
    border-color: #66afe9;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(102, 175, 233, 0.6);
    outline: 0 none;
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #eee;
    cursor: not-allowed;
}
textarea.form-control {
    height: auto;
}
.form-group {
    margin-bottom: 15px;
}
.radio, .checkbox {
    display: block;
    margin-bottom: 10px;
    margin-top: 10px;
    min-height: 20px;
    padding-left: 20px;
    vertical-align: middle;
}
.radio label, .checkbox label {
    cursor: pointer;
    display: inline;
    font-weight: normal;
    margin-bottom: 0;
}
.radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
    float: left;
    margin-left: -20px;
}
.radio + .radio, .checkbox + .checkbox {
    margin-top: -5px;
}
.radio-inline, .checkbox-inline {
    cursor: pointer;
    display: inline-block;
    font-weight: normal;
    margin-bottom: 0;
    padding-left: 20px;
    vertical-align: middle;
}
.radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline {
    margin-left: 10px;
    margin-top: 0;
}
input[type="radio"][disabled], input[type="checkbox"][disabled], .radio[disabled], .radio-inline[disabled], .checkbox[disabled], .checkbox-inline[disabled], fieldset[disabled] input[type="radio"], fieldset[disabled] input[type="checkbox"], fieldset[disabled] .radio, fieldset[disabled] .radio-inline, fieldset[disabled] .checkbox, fieldset[disabled] .checkbox-inline {
    cursor: not-allowed;
}
.input-sm {
    border-radius: 3px;
    font-size: 12px;
    height: 30px;
    line-height: 1.5;
    padding: 5px 10px;
    width: 50%;
}
select.input-sm {
    height: 30px;
    line-height: 30px;
}
textarea.input-sm {
    height: auto;
}
.input-lg {
    border-radius: 6px;
    font-size: 18px;
    height: 45px;
    line-height: 1.33;
    padding: 10px 16px;
}
select.input-lg {
    height: 45px;
    line-height: 45px;
}
textarea.input-lg {
    height: auto;
}
.has-warning .help-block, .has-warning .control-label {
    color: #c09853;
}
.has-warning .form-control {
    border-color: #c09853;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.has-warning .form-control:focus {
    border-color: #a47e3c;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 6px #dbc59e;
}
.has-warning .input-group-addon {
    background-color: #fcf8e3;
    border-color: #c09853;
    color: #c09853;
}
.has-error .help-block, .has-error .control-label {
    color: #b94a48;
}
.has-error .form-control {
    border-color: #b94a48;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.has-error .form-control:focus {
    border-color: #953b39;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 6px #d59392;
}
.has-error .input-group-addon {
    background-color: #f2dede;
    border-color: #b94a48;
    color: #b94a48;
}
.has-success .help-block, .has-success .control-label {
    color: #468847;
}
.has-success .form-control {
    border-color: #468847;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.has-success .form-control:focus {
    border-color: #356635;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 6px #7aba7b;
}
.has-success .input-group-addon {
    background-color: #dff0d8;
    border-color: #468847;
    color: #468847;
}
.form-control-static {
    margin-bottom: 0;
    padding-top: 7px;
}
.help-block {
    color: #737373;
    display: block;
    margin-bottom: 10px;
    margin-top: 5px;
}
@media (min-width: 768px) {
.form-inline .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
}
.form-inline .form-control {
    display: inline-block;
}
.form-inline .radio, .form-inline .checkbox {
    display: inline-block;
    margin-bottom: 0;
    margin-top: 0;
    padding-left: 0;
}
.form-inline .radio input[type="radio"], .form-inline .checkbox input[type="checkbox"] {
    float: none;
    margin-left: 0;
}
}
.form-horizontal .control-label, .form-horizontal .radio, .form-horizontal .checkbox, .form-horizontal .radio-inline, .form-horizontal .checkbox-inline {
    margin-bottom: 0;
    margin-top: 0;
    padding-top: 7px;
}
.form-horizontal .form-group {
    margin-left: -15px;
    margin-right: -15px;
}
.form-horizontal .form-group::before, .form-horizontal .form-group::after {
    content: " ";
    display: table;
}
.form-horizontal .form-group::after {
    clear: both;
}
.form-horizontal .form-group::before, .form-horizontal .form-group::after {
    content: " ";
    display: table;
}
.form-horizontal .form-group::after {
    clear: both;
}
@media (min-width: 768px) {
.form-horizontal .control-label {
    text-align: right;
}
}
.btn {
    -moz-user-select: none;
    border: 1px solid transparent;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857;
    margin-bottom: 0;
    padding: 6px 12px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
}
.btn:focus {
    outline: thin dotted #333;
    outline-offset: -2px;
}
.btn:hover, .btn:focus {
    color: #333;
    text-decoration: none;
}
.btn:active, .btn.active {
    background-image: none;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.125) inset;
    outline: 0 none;
}
.btn.disabled, .btn[disabled], fieldset[disabled] .btn {
    box-shadow: none;
    cursor: not-allowed;
    opacity: 0.65;
    pointer-events: none;
}
.btn-default {
    background-color: #fff;
    border-color: #ccc;
    color: #333;
}
.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
    background-color: #ebebeb;
    border-color: #adadad;
    color: #333;
}
.btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
    background-image: none;
}
.btn-default.disabled, .btn-default[disabled], fieldset[disabled] .btn-default, .btn-default.disabled:hover, .btn-default[disabled]:hover, fieldset[disabled] .btn-default:hover, .btn-default.disabled:focus, .btn-default[disabled]:focus, fieldset[disabled] .btn-default:focus, .btn-default.disabled:active, .btn-default[disabled]:active, fieldset[disabled] .btn-default:active, .btn-default.disabled.active, .btn-default.active[disabled], fieldset[disabled] .btn-default.active {
    background-color: #fff;
    border-color: #ccc;
}
.btn-primary {
    background-color: #428bca;
    border-color: #357ebd;
    color: #fff;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    background-color: #3276b1;
    border-color: #285e8e;
    color: #fff;
}
.btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    background-image: none;
}
.btn-primary.disabled, .btn-primary[disabled], fieldset[disabled] .btn-primary, .btn-primary.disabled:hover, .btn-primary[disabled]:hover, fieldset[disabled] .btn-primary:hover, .btn-primary.disabled:focus, .btn-primary[disabled]:focus, fieldset[disabled] .btn-primary:focus, .btn-primary.disabled:active, .btn-primary[disabled]:active, fieldset[disabled] .btn-primary:active, .btn-primary.disabled.active, .btn-primary.active[disabled], fieldset[disabled] .btn-primary.active {
    background-color: #428bca;
    border-color: #357ebd;
}
.btn-warning {
    background-color: #f0ad4e;
    border-color: #eea236;
    color: #fff;
}
.btn-warning:hover, .btn-warning:focus, .btn-warning:active, .btn-warning.active, .open .dropdown-toggle.btn-warning {
    background-color: #ed9c28;
    border-color: #d58512;
    color: #fff;
}
.btn-warning:active, .btn-warning.active, .open .dropdown-toggle.btn-warning {
    background-image: none;
}
.btn-warning.disabled, .btn-warning[disabled], fieldset[disabled] .btn-warning, .btn-warning.disabled:hover, .btn-warning[disabled]:hover, fieldset[disabled] .btn-warning:hover, .btn-warning.disabled:focus, .btn-warning[disabled]:focus, fieldset[disabled] .btn-warning:focus, .btn-warning.disabled:active, .btn-warning[disabled]:active, fieldset[disabled] .btn-warning:active, .btn-warning.disabled.active, .btn-warning.active[disabled], fieldset[disabled] .btn-warning.active {
    background-color: #f0ad4e;
    border-color: #eea236;
}
.btn-danger {
    background-color: #d9534f;
    border-color: #d43f3a;
    color: #fff;
}
.btn-danger:hover, .btn-danger:focus, .btn-danger:active, .btn-danger.active, .open .dropdown-toggle.btn-danger {
    background-color: #d2322d;
    border-color: #ac2925;
    color: #fff;
}
.btn-danger:active, .btn-danger.active, .open .dropdown-toggle.btn-danger {
    background-image: none;
}
.btn-danger.disabled, .btn-danger[disabled], fieldset[disabled] .btn-danger, .btn-danger.disabled:hover, .btn-danger[disabled]:hover, fieldset[disabled] .btn-danger:hover, .btn-danger.disabled:focus, .btn-danger[disabled]:focus, fieldset[disabled] .btn-danger:focus, .btn-danger.disabled:active, .btn-danger[disabled]:active, fieldset[disabled] .btn-danger:active, .btn-danger.disabled.active, .btn-danger.active[disabled], fieldset[disabled] .btn-danger.active {
    background-color: #d9534f;
    border-color: #d43f3a;
}
.btn-success {
    background-color: #5cb85c;
    border-color: #4cae4c;
    color: #fff;
}
.btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open .dropdown-toggle.btn-success {
    background-color: #47a447;
    border-color: #398439;
    color: #fff;
}
.btn-success:active, .btn-success.active, .open .dropdown-toggle.btn-success {
    background-image: none;
}
.btn-success.disabled, .btn-success[disabled], fieldset[disabled] .btn-success, .btn-success.disabled:hover, .btn-success[disabled]:hover, fieldset[disabled] .btn-success:hover, .btn-success.disabled:focus, .btn-success[disabled]:focus, fieldset[disabled] .btn-success:focus, .btn-success.disabled:active, .btn-success[disabled]:active, fieldset[disabled] .btn-success:active, .btn-success.disabled.active, .btn-success.active[disabled], fieldset[disabled] .btn-success.active {
    background-color: #5cb85c;
    border-color: #4cae4c;
}
.btn-info {
    background-color: #5bc0de;
    border-color: #46b8da;
    color: #fff;
}
.btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open .dropdown-toggle.btn-info {
    background-color: #39b3d7;
    border-color: #269abc;
    color: #fff;
}
.btn-info:active, .btn-info.active, .open .dropdown-toggle.btn-info {
    background-image: none;
}
.btn-info.disabled, .btn-info[disabled], fieldset[disabled] .btn-info, .btn-info.disabled:hover, .btn-info[disabled]:hover, fieldset[disabled] .btn-info:hover, .btn-info.disabled:focus, .btn-info[disabled]:focus, fieldset[disabled] .btn-info:focus, .btn-info.disabled:active, .btn-info[disabled]:active, fieldset[disabled] .btn-info:active, .btn-info.disabled.active, .btn-info.active[disabled], fieldset[disabled] .btn-info.active {
    background-color: #5bc0de;
    border-color: #46b8da;
}
.btn-link {
    border-radius: 0;
    color: #428bca;
    cursor: pointer;
    font-weight: normal;
}
.btn-link, .btn-link:active, .btn-link[disabled], fieldset[disabled] .btn-link {
    background-color: transparent;
    box-shadow: none;
}
.btn-link, .btn-link:hover, .btn-link:focus, .btn-link:active {
    border-color: transparent;
}
.btn-link:hover, .btn-link:focus {
    background-color: transparent;
    color: #2a6496;
    text-decoration: underline;
}
.btn-link[disabled]:hover, fieldset[disabled] .btn-link:hover, .btn-link[disabled]:focus, fieldset[disabled] .btn-link:focus {
    color: #999;
    text-decoration: none;
}
.btn-lg {
    border-radius: 6px;
    font-size: 18px;
    line-height: 1.33;
    padding: 10px 16px;
}
.btn-sm, .btn-xs {
    border-radius: 3px;
    font-size: 12px;
    line-height: 1.5;
    padding: 5px 10px;
}
.btn-xs {
    padding: 1px 5px;
}
.btn-block {
    display: block;
    padding-left: 0;
    padding-right: 0;
    width: 100%;
}
.btn-block + .btn-block {
    margin-top: 5px;
}
input.btn-block[type="submit"], input.btn-block[type="reset"], input.btn-block[type="button"] {
    width: 100%;
}
.fade {
    opacity: 0;
    transition: opacity 0.15s linear 0s;
}
.fade.in {
    opacity: 1;
}
.collapse {
    display: none;
}
.collapse.in {
    display: block;
}
.collapsing {
    height: 0;
    overflow: hidden;
    position: relative;
    transition: height 0.35s ease 0s;
}
@font-face {
    font-family: "Glyphicons Halflings";
    src: url("../fonts/glyphicons-halflings-regular.eot?#iefix") format("embedded-opentype"), url("../fonts/glyphicons-halflings-regular.woff") format("woff"), url("../fonts/glyphicons-halflings-regular.ttf") format("truetype"), url("../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular") format("svg");
}
.glyphicon {
    display: inline-block;
    font-family: "Glyphicons Halflings";
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    position: relative;
    top: 1px;
}
.glyphicon-asterisk::before {
    content: "*";
}
.glyphicon-plus::before {
    content: "+";
}
.glyphicon-euro::before {
    content: "€";
}
.glyphicon-minus::before {
    content: "−";
}
.glyphicon-cloud::before {
    content: "☁";
}
.glyphicon-envelope::before {
    content: "✉";
}
.glyphicon-pencil::before {
    content: "✏";
}
.glyphicon-glass::before {
    content: "";
}
.glyphicon-music::before {
    content: "";
}
.glyphicon-search::before {
    content: "";
}
.glyphicon-heart::before {
    content: "";
}
.glyphicon-star::before {
    content: "";
}
.glyphicon-star-empty::before {
    content: "";
}
.glyphicon-user::before {
    content: "";
}
.glyphicon-film::before {
    content: "";
}
.glyphicon-th-large::before {
    content: "";
}
.glyphicon-th::before {
    content: "";
}
.glyphicon-th-list::before {
    content: "";
}
.glyphicon-ok::before {
    content: "";
}
.glyphicon-remove::before {
    content: "";
}
.glyphicon-zoom-in::before {
    content: "";
}
.glyphicon-zoom-out::before {
    content: "";
}
.glyphicon-off::before {
    content: "";
}
.glyphicon-signal::before {
    content: "";
}
.glyphicon-cog::before {
    content: "";
}
.glyphicon-trash::before {
    content: "";
}
.glyphicon-home::before {
    content: "";
}
.glyphicon-file::before {
    content: "";
}
.glyphicon-time::before {
    content: "";
}
.glyphicon-road::before {
    content: "";
}
.glyphicon-download-alt::before {
    content: "";
}
.glyphicon-download::before {
    content: "";
}
.glyphicon-upload::before {
    content: "";
}
.glyphicon-inbox::before {
    content: "";
}
.glyphicon-play-circle::before {
    content: "";
}
.glyphicon-repeat::before {
    content: "";
}
.glyphicon-refresh::before {
    content: "";
}
.glyphicon-list-alt::before {
    content: "";
}
.glyphicon-flag::before {
    content: "";
}
.glyphicon-headphones::before {
    content: "";
}
.glyphicon-volume-off::before {
    content: "";
}
.glyphicon-volume-down::before {
    content: "";
}
.glyphicon-volume-up::before {
    content: "";
}
.glyphicon-qrcode::before {
    content: "";
}
.glyphicon-barcode::before {
    content: "";
}
.glyphicon-tag::before {
    content: "";
}
.glyphicon-tags::before {
    content: "";
}
.glyphicon-book::before {
    content: "";
}
.glyphicon-print::before {
    content: "";
}
.glyphicon-font::before {
    content: "";
}
.glyphicon-bold::before {
    content: "";
}
.glyphicon-italic::before {
    content: "";
}
.glyphicon-text-height::before {
    content: "";
}
.glyphicon-text-width::before {
    content: "";
}
.glyphicon-align-left::before {
    content: "";
}
.glyphicon-align-center::before {
    content: "";
}
.glyphicon-align-right::before {
    content: "";
}
.glyphicon-align-justify::before {
    content: "";
}
.glyphicon-list::before {
    content: "";
}
.glyphicon-indent-left::before {
    content: "";
}
.glyphicon-indent-right::before {
    content: "";
}
.glyphicon-facetime-video::before {
    content: "";
}
.glyphicon-picture::before {
    content: "";
}
.glyphicon-map-marker::before {
    content: "";
}
.glyphicon-adjust::before {
    content: "";
}
.glyphicon-tint::before {
    content: "";
}
.glyphicon-edit::before {
    content: "";
}
.glyphicon-share::before {
    content: "";
}
.glyphicon-check::before {
    content: "";
}
.glyphicon-move::before {
    content: "";
}
.glyphicon-step-backward::before {
    content: "";
}
.glyphicon-fast-backward::before {
    content: "";
}
.glyphicon-backward::before {
    content: "";
}
.glyphicon-play::before {
    content: "";
}
.glyphicon-pause::before {
    content: "";
}
.glyphicon-stop::before {
    content: "";
}
.glyphicon-forward::before {
    content: "";
}
.glyphicon-fast-forward::before {
    content: "";
}
.glyphicon-step-forward::before {
    content: "";
}
.glyphicon-eject::before {
    content: "";
}
.glyphicon-chevron-left::before {
    content: "";
}
.glyphicon-chevron-right::before {
    content: "";
}
.glyphicon-plus-sign::before {
    content: "";
}
.glyphicon-minus-sign::before {
    content: "";
}
.glyphicon-remove-sign::before {
    content: "";
}
.glyphicon-ok-sign::before {
    content: "";
}
.glyphicon-question-sign::before {
    content: "";
}
.glyphicon-info-sign::before {
    content: "";
}
.glyphicon-screenshot::before {
    content: "";
}
.glyphicon-remove-circle::before {
    content: "";
}
.glyphicon-ok-circle::before {
    content: "";
}
.glyphicon-ban-circle::before {
    content: "";
}
.glyphicon-arrow-left::before {
    content: "";
}
.glyphicon-arrow-right::before {
    content: "";
}
.glyphicon-arrow-up::before {
    content: "";
}
.glyphicon-arrow-down::before {
    content: "";
}
.glyphicon-share-alt::before {
    content: "";
}
.glyphicon-resize-full::before {
    content: "";
}
.glyphicon-resize-small::before {
    content: "";
}
.glyphicon-exclamation-sign::before {
    content: "";
}
.glyphicon-gift::before {
    content: "";
}
.glyphicon-leaf::before {
    content: "";
}
.glyphicon-eye-open::before {
    content: "";
}
.glyphicon-eye-close::before {
    content: "";
}
.glyphicon-warning-sign::before {
    content: "";
}
.glyphicon-plane::before {
    content: "";
}
.glyphicon-random::before {
    content: "";
}
.glyphicon-comment::before {
    content: "";
}
.glyphicon-magnet::before {
    content: "";
}
.glyphicon-chevron-up::before {
    content: "";
}
.glyphicon-chevron-down::before {
    content: "";
}
.glyphicon-retweet::before {
    content: "";
}
.glyphicon-shopping-cart::before {
    content: "";
}
.glyphicon-folder-close::before {
    content: "";
}
.glyphicon-folder-open::before {
    content: "";
}
.glyphicon-resize-vertical::before {
    content: "";
}
.glyphicon-resize-horizontal::before {
    content: "";
}
.glyphicon-hdd::before {
    content: "";
}
.glyphicon-bullhorn::before {
    content: "";
}
.glyphicon-certificate::before {
    content: "";
}
.glyphicon-thumbs-up::before {
    content: "";
}
.glyphicon-thumbs-down::before {
    content: "";
}
.glyphicon-hand-right::before {
    content: "";
}
.glyphicon-hand-left::before {
    content: "";
}
.glyphicon-hand-up::before {
    content: "";
}
.glyphicon-hand-down::before {
    content: "";
}
.glyphicon-circle-arrow-right::before {
    content: "";
}
.glyphicon-circle-arrow-left::before {
    content: "";
}
.glyphicon-circle-arrow-up::before {
    content: "";
}
.glyphicon-circle-arrow-down::before {
    content: "";
}
.glyphicon-globe::before {
    content: "";
}
.glyphicon-tasks::before {
    content: "";
}
.glyphicon-filter::before {
    content: "";
}
.glyphicon-fullscreen::before {
    content: "";
}
.glyphicon-dashboard::before {
    content: "";
}
.glyphicon-heart-empty::before {
    content: "";
}
.glyphicon-link::before {
    content: "";
}
.glyphicon-phone::before {
    content: "";
}
.glyphicon-usd::before {
    content: "";
}
.glyphicon-gbp::before {
    content: "";
}
.glyphicon-sort::before {
    content: "";
}
.glyphicon-sort-by-alphabet::before {
    content: "";
}
.glyphicon-sort-by-alphabet-alt::before {
    content: "";
}
.glyphicon-sort-by-order::before {
    content: "";
}
.glyphicon-sort-by-order-alt::before {
    content: "";
}
.glyphicon-sort-by-attributes::before {
    content: "";
}
.glyphicon-sort-by-attributes-alt::before {
    content: "";
}
.glyphicon-unchecked::before {
    content: "";
}
.glyphicon-expand::before {
    content: "";
}
.glyphicon-collapse-down::before {
    content: "";
}
.glyphicon-collapse-up::before {
    content: "";
}
.glyphicon-log-in::before {
    content: "";
}
.glyphicon-flash::before {
    content: "";
}
.glyphicon-log-out::before {
    content: "";
}
.glyphicon-new-window::before {
    content: "";
}
.glyphicon-record::before {
    content: "";
}
.glyphicon-save::before {
    content: "";
}
.glyphicon-open::before {
    content: "";
}
.glyphicon-saved::before {
    content: "";
}
.glyphicon-import::before {
    content: "";
}
.glyphicon-export::before {
    content: "";
}
.glyphicon-send::before {
    content: "";
}
.glyphicon-floppy-disk::before {
    content: "";
}
.glyphicon-floppy-saved::before {
    content: "";
}
.glyphicon-floppy-remove::before {
    content: "";
}
.glyphicon-floppy-save::before {
    content: "";
}
.glyphicon-floppy-open::before {
    content: "";
}
.glyphicon-credit-card::before {
    content: "";
}
.glyphicon-transfer::before {
    content: "";
}
.glyphicon-cutlery::before {
    content: "";
}
.glyphicon-header::before {
    content: "";
}
.glyphicon-compressed::before {
    content: "";
}
.glyphicon-earphone::before {
    content: "";
}
.glyphicon-phone-alt::before {
    content: "";
}
.glyphicon-tower::before {
    content: "";
}
.glyphicon-stats::before {
    content: "";
}
.glyphicon-sd-video::before {
    content: "";
}
.glyphicon-hd-video::before {
    content: "";
}
.glyphicon-subtitles::before {
    content: "";
}
.glyphicon-sound-stereo::before {
    content: "";
}
.glyphicon-sound-dolby::before {
    content: "";
}
.glyphicon-sound-5-1::before {
    content: "";
}
.glyphicon-sound-6-1::before {
    content: "";
}
.glyphicon-sound-7-1::before {
    content: "";
}
.glyphicon-copyright-mark::before {
    content: "";
}
.glyphicon-registration-mark::before {
    content: "";
}
.glyphicon-cloud-download::before {
    content: "";
}
.glyphicon-cloud-upload::before {
    content: "";
}
.glyphicon-tree-conifer::before {
    content: "";
}
.glyphicon-tree-deciduous::before {
    content: "";
}
.glyphicon-briefcase::before {
    content: "💼";
}
.glyphicon-calendar::before {
    content: "📅";
}
.glyphicon-pushpin::before {
    content: "📌";
}
.glyphicon-paperclip::before {
    content: "📎";
}
.glyphicon-camera::before {
    content: "📷";
}
.glyphicon-lock::before {
    content: "🔒";
}
.glyphicon-bell::before {
    content: "🔔";
}
.glyphicon-bookmark::before {
    content: "🔖";
}
.glyphicon-fire::before {
    content: "🔥";
}
.glyphicon-wrench::before {
    content: "🔧";
}
.caret {
    border-color: #000 transparent -moz-use-text-color;
    border-style: solid solid dotted;
    border-width: 4px 4px 0;
    content: "";
    display: inline-block;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    width: 0;
}
.dropdown {
    position: relative;
}
.dropdown-toggle:focus {
    outline: 0 none;
}
.dropdown-menu {
    background-clip: padding-box;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.176);
    display: none;
    float: left;
    font-size: 14px;
    left: 0;
    list-style: outside none none;
    margin: 2px 0 0;
    min-width: 160px;
    padding: 5px 0;
    position: absolute;
    top: 100%;
    z-index: 1000;
}
.dropdown-menu.pull-right {
    left: auto;
    right: 0;
}
.dropdown-menu .divider {
    background-color: #e5e5e5;
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
}
.dropdown-menu > li > a {
    clear: both;
    color: #333;
    display: block;
    font-weight: normal;
    line-height: 1.42857;
    padding: 3px 20px;
    white-space: nowrap;
}
.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
    background-color: #428bca;
    color: #fff;
    text-decoration: none;
}
.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
    background-color: #428bca;
    color: #fff;
    outline: 0 none;
    text-decoration: none;
}
.dropdown-menu > .disabled > a, .dropdown-menu > .disabled > a:hover, .dropdown-menu > .disabled > a:focus {
    color: #999;
}
.dropdown-menu > .disabled > a:hover, .dropdown-menu > .disabled > a:focus {
    background-color: transparent;
    background-image: none;
    cursor: not-allowed;
    text-decoration: none;
}
.open > .dropdown-menu {
    display: block;
}
.open > a {
    outline: 0 none;
}
.dropdown-header {
    color: #999;
    display: block;
    font-size: 12px;
    line-height: 1.42857;
    padding: 3px 20px;
}
.dropdown-backdrop {
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 990;
}
.pull-right > .dropdown-menu {
    left: auto;
    right: 0;
}
.dropup .caret, .navbar-fixed-bottom .dropdown .caret {
    border-bottom: 4px solid #000;
    border-top: 0 dotted;
    content: "";
}
.dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
    bottom: 100%;
    margin-bottom: 1px;
    top: auto;
}
@media (min-width: 768px) {
.navbar-right .dropdown-menu {
    left: auto;
    right: 0;
}
}
.btn-default .caret {
    border-top-color: #333;
}
.btn-primary .caret, .btn-success .caret, .btn-warning .caret, .btn-danger .caret, .btn-info .caret {
    border-top-color: #fff;
}
.dropup .btn-default .caret {
    border-bottom-color: #333;
}
.dropup .btn-primary .caret, .dropup .btn-success .caret, .dropup .btn-warning .caret, .dropup .btn-danger .caret, .dropup .btn-info .caret {
    border-bottom-color: #fff;
}
.btn-group, .btn-group-vertical {
    display: inline-block;
    position: relative;
    vertical-align: middle;
}
.btn-group > .btn, .btn-group-vertical > .btn {
    float: left;
    position: relative;
}
.btn-group > .btn:hover, .btn-group-vertical > .btn:hover, .btn-group > .btn:focus, .btn-group-vertical > .btn:focus, .btn-group > .btn:active, .btn-group-vertical > .btn:active, .btn-group > .btn.active, .btn-group-vertical > .btn.active {
    z-index: 2;
}
.btn-group > .btn:focus, .btn-group-vertical > .btn:focus {
    outline: 0 none;
}
.btn-group .btn + .btn, .btn-group .btn + .btn-group, .btn-group .btn-group + .btn, .btn-group .btn-group + .btn-group {
    margin-left: -1px;
}
.btn-toolbar::before, .btn-toolbar::after {
    content: " ";
    display: table;
}
.btn-toolbar::after {
    clear: both;
}
.btn-toolbar::before, .btn-toolbar::after {
    content: " ";
    display: table;
}
.btn-toolbar::after {
    clear: both;
}
.btn-toolbar .btn-group {
    float: left;
}
.btn-toolbar > .btn + .btn, .btn-toolbar > .btn-group + .btn, .btn-toolbar > .btn + .btn-group, .btn-toolbar > .btn-group + .btn-group {
    margin-left: 5px;
}
.btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
    border-radius: 0;
}
.btn-group > .btn:first-child {
    margin-left: 0;
}
.btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
}
.btn-group > .btn:last-child:not(:first-child), .btn-group > .dropdown-toggle:not(:first-child) {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}
.btn-group > .btn-group {
    float: left;
}
.btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
    border-radius: 0;
}
.btn-group > .btn-group:first-child > .btn:last-child, .btn-group > .btn-group:first-child > .dropdown-toggle {
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
}
.btn-group > .btn-group:last-child > .btn:first-child {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}
.btn-group .dropdown-toggle:active, .btn-group.open .dropdown-toggle {
    outline: 0 none;
}
.btn-group-xs > .btn {
    border-radius: 3px;
    font-size: 12px;
    line-height: 1.5;
    padding: 1px 5px;
}
.btn-group-sm > .btn {
    border-radius: 3px;
    font-size: 12px;
    line-height: 1.5;
    padding: 5px 10px;
}
.btn-group-lg > .btn {
    border-radius: 6px;
    font-size: 18px;
    line-height: 1.33;
    padding: 10px 16px;
}
.btn-group > .btn + .dropdown-toggle {
    padding-left: 8px;
    padding-right: 8px;
}
.btn-group > .btn-lg + .dropdown-toggle {
    padding-left: 12px;
    padding-right: 12px;
}
.btn-group.open .dropdown-toggle {
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.125) inset;
}
.btn .caret {
    margin-left: 0;
}
.btn-lg .caret {
    border-width: 5px 5px 0;
}
.dropup .btn-lg .caret {
    border-width: 0 5px 5px;
}
.btn-group-vertical > .btn, .btn-group-vertical > .btn-group {
    display: block;
    float: none;
    max-width: 100%;
    width: 100%;
}
.btn-group-vertical > .btn-group::before, .btn-group-vertical > .btn-group::after {
    content: " ";
    display: table;
}
.btn-group-vertical > .btn-group::after {
    clear: both;
}
.btn-group-vertical > .btn-group::before, .btn-group-vertical > .btn-group::after {
    content: " ";
    display: table;
}
.btn-group-vertical > .btn-group::after {
    clear: both;
}
.btn-group-vertical > .btn-group > .btn {
    float: none;
}
.btn-group-vertical > .btn + .btn, .btn-group-vertical > .btn + .btn-group, .btn-group-vertical > .btn-group + .btn, .btn-group-vertical > .btn-group + .btn-group {
    margin-left: 0;
    margin-top: -1px;
}
.btn-group-vertical > .btn:not(:first-child):not(:last-child) {
    border-radius: 0;
}
.btn-group-vertical > .btn:first-child:not(:last-child) {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-top-right-radius: 4px;
}
.btn-group-vertical > .btn:last-child:not(:first-child) {
    border-bottom-left-radius: 4px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
    border-radius: 0;
}
.btn-group-vertical > .btn-group:first-child > .btn:last-child, .btn-group-vertical > .btn-group:first-child > .dropdown-toggle {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.btn-group-vertical > .btn-group:last-child > .btn:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.btn-group-justified {
    border-collapse: separate;
    display: table;
    table-layout: fixed;
    width: 100%;
}
.btn-group-justified .btn {
    display: table-cell;
    float: none;
    width: 1%;
}
[data-toggle="buttons"] > .btn > input[type="radio"], [data-toggle="buttons"] > .btn > input[type="checkbox"] {
    display: none;
}
.input-group {
    border-collapse: separate;
    display: table;
    position: relative;
}
.input-group.col {
    float: none;
    padding-left: 0;
    padding-right: 0;
}
.input-group .form-control {
    margin-bottom: 0;
    width: 100%;
}
.input-group-lg > .form-control, .input-group-lg > .input-group-addon, .input-group-lg > .input-group-btn > .btn {
    border-radius: 6px;
    font-size: 18px;
    height: 45px;
    line-height: 1.33;
    padding: 10px 16px;
}
select.input-group-lg > .form-control, select.input-group-lg > .input-group-addon, select.input-group-lg > .input-group-btn > .btn {
    height: 45px;
    line-height: 45px;
}
textarea.input-group-lg > .form-control, textarea.input-group-lg > .input-group-addon, textarea.input-group-lg > .input-group-btn > .btn {
    height: auto;
}
.input-group-sm > .form-control, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .btn {
    border-radius: 3px;
    font-size: 12px;
    height: 30px;
    line-height: 1.5;
    padding: 5px 10px;
}
select.input-group-sm > .form-control, select.input-group-sm > .input-group-addon, select.input-group-sm > .input-group-btn > .btn {
    height: 30px;
    line-height: 30px;
}
textarea.input-group-sm > .form-control, textarea.input-group-sm > .input-group-addon, textarea.input-group-sm > .input-group-btn > .btn {
    height: auto;
}
.input-group-addon, .input-group-btn, .input-group .form-control {
    display: table-cell;
}
.input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child), .input-group .form-control:not(:first-child):not(:last-child) {
    border-radius: 0;
}
.input-group-addon, .input-group-btn {
    vertical-align: middle;
    white-space: nowrap;
    width: 1%;
}
.input-group-addon {
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    font-weight: normal;
    line-height: 1;
    padding: 6px 12px;
    text-align: center;
}
.input-group-addon.input-sm {
    border-radius: 3px;
    font-size: 12px;
    padding: 5px 10px;
}
.input-group-addon.input-lg {
    border-radius: 6px;
    font-size: 18px;
    padding: 10px 16px;
}
.input-group-addon input[type="radio"], .input-group-addon input[type="checkbox"] {
    margin-top: 0;
}
.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
}
.input-group-addon:first-child {
    border-right: 0 none;
}
.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child > .btn, .input-group-btn:last-child > .dropdown-toggle, .input-group-btn:first-child > .btn:not(:first-child) {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
}
.input-group-addon:last-child {
    border-left: 0 none;
}
.input-group-btn {
    position: relative;
    white-space: nowrap;
}
.input-group-btn > .btn {
    position: relative;
}
.input-group-btn > .btn + .btn {
    margin-left: -4px;
}
.input-group-btn > .btn:hover, .input-group-btn > .btn:active {
    z-index: 2;
}
.nav {
    list-style: outside none none;
    margin-bottom: 0;
    padding-left: 0;
}
.nav::before, .nav::after {
    content: " ";
    display: table;
}
.nav::after {
    clear: both;
}
.nav::before, .nav::after {
    content: " ";
    display: table;
}
.nav::after {
    clear: both;
}
.nav > li {
    display: block;
    position: relative;
}
.nav > li > a {
    display: block;
    padding: 10px 15px;
    position: relative;
}
.nav > li > a:hover, .nav > li > a:focus {
    background-color: #eee;
    text-decoration: none;
}
.nav > li.disabled > a {
    color: #999;
}
.nav > li.disabled > a:hover, .nav > li.disabled > a:focus {
    background-color: transparent;
    color: #999;
    cursor: not-allowed;
    text-decoration: none;
}
.nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
    background-color: #eee;
    border-color: #428bca;
}
.nav .nav-divider {
    background-color: #e5e5e5;
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
}
.nav > li > a > img {
    max-width: none;
}
.nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav-tabs > li {
    float: left;
    margin-bottom: -1px;
}
.nav-tabs > li > a {
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    line-height: 1.42857;
    margin-right: 2px;
}
.nav-tabs > li > a:hover {
    border-color: #eee #eee #ddd;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #fff;
    border-color: #ddd #ddd transparent;
    border-image: none;
    border-style: solid;
    border-width: 1px;
    color: #555;
    cursor: default;
}
.nav-tabs.nav-justified {
    border-bottom: 0 none;
    width: 100%;
}
.nav-tabs.nav-justified > li {
    float: none;
}
.nav-tabs.nav-justified > li > a {
    text-align: center;
}
@media (min-width: 768px) {
.nav-tabs.nav-justified > li {
    display: table-cell;
    width: 1%;
}
}
.nav-tabs.nav-justified > li > a {
    border-bottom: 1px solid #ddd;
    margin-right: 0;
}
.nav-tabs.nav-justified > .active > a {
    border-bottom-color: #fff;
}
.nav-pills > li {
    float: left;
}
.nav-pills > li > a {
    border-radius: 5px;
}
.nav-pills > li + li {
    margin-left: 2px;
}
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    background-color: #428bca;
    color: #fff;
}
.nav-stacked > li {
    float: none;
}
.nav-stacked > li + li {
    margin-left: 0;
    margin-top: 2px;
}
.nav-justified {
    width: 100%;
}
.nav-justified > li {
    float: none;
}
.nav-justified > li > a {
    text-align: center;
}
@media (min-width: 768px) {
.nav-justified > li {
    display: table-cell;
    width: 1%;
}
}
.nav-tabs-justified {
    border-bottom: 0 none;
}
.nav-tabs-justified > li > a {
    border-bottom: 1px solid #ddd;
    margin-right: 0;
}
.nav-tabs-justified > .active > a {
    border-bottom-color: #fff;
}
.tabbable::before, .tabbable::after {
    content: " ";
    display: table;
}
.tabbable::after {
    clear: both;
}
.tabbable::before, .tabbable::after {
    content: " ";
    display: table;
}
.tabbable::after {
    clear: both;
}
.tab-content > .tab-pane, .pill-content > .pill-pane {
    display: none;
}
.tab-content > .active, .pill-content > .active {
    display: block;
}
.nav .caret {
    border-bottom-color: #428bca;
    border-top-color: #428bca;
}
.nav a:hover .caret {
    border-bottom-color: #2a6496;
    border-top-color: #2a6496;
}
.nav-tabs .dropdown-menu {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    margin-top: -1px;
}
.navbar {
    border: 1px solid transparent;
    margin-bottom: 20px;
    min-height: 50px;
    position: relative;
    z-index: 1000;
}
.navbar::before, .navbar::after {
    content: " ";
    display: table;
}
.navbar::after {
    clear: both;
}
.navbar::before, .navbar::after {
    content: " ";
    display: table;
}
.navbar::after {
    clear: both;
}
@media (min-width: 768px) {
.navbar {
    border-radius: 4px;
}
}
.navbar-header::before, .navbar-header::after {
    content: " ";
    display: table;
}
.navbar-header::after {
    clear: both;
}
.navbar-header::before, .navbar-header::after {
    content: " ";
    display: table;
}
.navbar-header::after {
    clear: both;
}
@media (min-width: 768px) {
.navbar-header {
    float: left;
}
}
.navbar-collapse {
    border-top: 1px solid transparent;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset;
    max-height: 340px;
    overflow-x: visible;
    padding-left: 15px;
    padding-right: 15px;
}
.navbar-collapse::before, .navbar-collapse::after {
    content: " ";
    display: table;
}
.navbar-collapse::after {
    clear: both;
}
.navbar-collapse::before, .navbar-collapse::after {
    content: " ";
    display: table;
}
.navbar-collapse::after {
    clear: both;
}
.navbar-collapse.in {
    overflow-y: auto;
}
@media (min-width: 768px) {
.navbar-collapse {
    border-top: 0 none;
    box-shadow: none;
    width: auto;
}
.navbar-collapse.collapse {
    display: block !important;
    height: auto !important;
    overflow: visible !important;
    padding-bottom: 0;
}
.navbar-collapse.in {
    overflow-y: visible;
}
.navbar-collapse .navbar-nav.navbar-left:first-child {
    margin-left: -15px;
}
.navbar-collapse .navbar-nav.navbar-right:last-child {
    margin-right: -15px;
}
.navbar-collapse .navbar-text:last-child {
    margin-right: 0;
}
}
.container > .navbar-header, .container > .navbar-collapse {
    margin-left: -15px;
    margin-right: -15px;
}
@media (min-width: 768px) {
.container > .navbar-header, .container > .navbar-collapse {
    margin-left: 0;
    margin-right: 0;
}
}
.navbar-static-top {
    border-width: 0 0 1px;
}
@media (min-width: 768px) {
.navbar-static-top {
    border-radius: 0;
}
}
.navbar-fixed-top, .navbar-fixed-bottom {
    border-width: 0 0 1px;
    left: 0;
    position: fixed;
    right: 0;
}
@media (min-width: 768px) {
.navbar-fixed-top, .navbar-fixed-bottom {
    border-radius: 0;
}
}
.navbar-fixed-top {
    top: 0;
    z-index: 1030;
}
.navbar-fixed-bottom {
    bottom: 0;
    margin-bottom: 0;
}
.navbar-brand {
    float: left;
    font-size: 18px;
    line-height: 20px;
    padding: 15px;
}
.navbar-brand:hover, .navbar-brand:focus {
    text-decoration: none;
}
@media (min-width: 768px) {
.navbar > .container .navbar-brand {
    margin-left: -15px;
}
}
.navbar-toggle {
    background-color: transparent;
    border: 1px solid transparent;
    border-radius: 4px;
    float: right;
    margin-bottom: 8px;
    margin-right: 15px;
    margin-top: 8px;
    padding: 9px 10px;
    position: relative;
}
.navbar-toggle .icon-bar {
    border-radius: 1px;
    display: block;
    height: 2px;
    width: 22px;
}
.navbar-toggle .icon-bar + .icon-bar {
    margin-top: 4px;
}
@media (min-width: 768px) {
.navbar-toggle {
    display: none;
}
}
.navbar-nav {
    margin: 7.5px -15px;
}
.navbar-nav > li > a {
    line-height: 20px;
    padding-bottom: 10px;
    padding-top: 10px;
}
@media (max-width: 767px) {
.navbar-nav .open .dropdown-menu {
    background-color: transparent;
    border: 0 none;
    box-shadow: none;
    float: none;
    margin-top: 0;
    position: static;
    width: auto;
}
.navbar-nav .open .dropdown-menu > li > a, .navbar-nav .open .dropdown-menu .dropdown-header {
    padding: 5px 15px 5px 25px;
}
.navbar-nav .open .dropdown-menu > li > a {
    line-height: 20px;
}
.navbar-nav .open .dropdown-menu > li > a:hover, .navbar-nav .open .dropdown-menu > li > a:focus {
    background-image: none;
}
}
@media (min-width: 768px) {
.navbar-nav {
    float: left;
    margin: 0;
}
.navbar-nav > li {
    float: left;
}
.navbar-nav > li > a {
    padding-bottom: 15px;
    padding-top: 15px;
}
}
@media (min-width: 768px) {
.navbar-left {
    float: left !important;
}
.navbar-right {
    float: right !important;
}
}
.navbar-form {
    border-bottom: 1px solid transparent;
    border-top: 1px solid transparent;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.1);
    margin: 8px -15px;
    padding: 10px 15px;
}
@media (min-width: 768px) {
.navbar-form .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
}
.navbar-form .form-control {
    display: inline-block;
}
.navbar-form .radio, .navbar-form .checkbox {
    display: inline-block;
    margin-bottom: 0;
    margin-top: 0;
    padding-left: 0;
}
.navbar-form .radio input[type="radio"], .navbar-form .checkbox input[type="checkbox"] {
    float: none;
    margin-left: 0;
}
}
@media (max-width: 767px) {
.navbar-form .form-group {
    margin-bottom: 5px;
}
}
@media (min-width: 768px) {
.navbar-form {
    border: 0 none;
    box-shadow: none;
    margin-left: 0;
    margin-right: 0;
    padding-bottom: 0;
    padding-top: 0;
    width: auto;
}
}
.navbar-nav > li > .dropdown-menu {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    margin-top: 0;
}
.navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.navbar-nav.pull-right > li > .dropdown-menu, .navbar-nav > li > .dropdown-menu.pull-right {
    left: auto;
    right: 0;
}
.navbar-btn {
    margin-bottom: 8px;
    margin-top: 8px;
}
.navbar-text {
    float: left;
    margin-bottom: 15px;
    margin-top: 15px;
}
@media (min-width: 768px) {
.navbar-text {
    margin-left: 15px;
    margin-right: 15px;
}
}
.navbar-default {
    background-color: #f8f8f8;
    border-color: #e7e7e7;
}
.navbar-default .navbar-brand {
    color: #777;
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
    background-color: transparent;
    color: #5e5e5e;
}
.navbar-default .navbar-text {
    color: #777;
}
.navbar-default .navbar-nav > li > a {
    color: #777;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    background-color: transparent;
    color: #333;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    background-color: #e7e7e7;
    color: #555;
}
.navbar-default .navbar-nav > .disabled > a, .navbar-default .navbar-nav > .disabled > a:hover, .navbar-default .navbar-nav > .disabled > a:focus {
    background-color: transparent;
    color: #ccc;
}
.navbar-default .navbar-toggle {
    border-color: #ddd;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
    background-color: #ddd;
}
.navbar-default .navbar-toggle .icon-bar {
    background-color: #ccc;
}
.navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #e6e6e6;
}
.navbar-default .navbar-nav > .dropdown > a:hover .caret, .navbar-default .navbar-nav > .dropdown > a:focus .caret {
    border-bottom-color: #333;
    border-top-color: #333;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
    background-color: #e7e7e7;
    color: #555;
}
.navbar-default .navbar-nav > .open > a .caret, .navbar-default .navbar-nav > .open > a:hover .caret, .navbar-default .navbar-nav > .open > a:focus .caret {
    border-bottom-color: #555;
    border-top-color: #555;
}
.navbar-default .navbar-nav > .dropdown > a .caret {
    border-bottom-color: #777;
    border-top-color: #777;
}
@media (max-width: 767px) {
.navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #777;
}
.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    background-color: transparent;
    color: #333;
}
.navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    background-color: #e7e7e7;
    color: #555;
}
.navbar-default .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    background-color: transparent;
    color: #ccc;
}
}
.navbar-default .navbar-link {
    color: #777;
}
.navbar-default .navbar-link:hover {
    color: #333;
}
.navbar-inverse {
    background-color: #222;
    border-color: #080808;
}
.navbar-inverse .navbar-brand {
    color: #999;
}
.navbar-inverse .navbar-brand:hover, .navbar-inverse .navbar-brand:focus {
    background-color: transparent;
    color: #fff;
}
.navbar-inverse .navbar-text {
    color: #999;
}
.navbar-inverse .navbar-nav > li > a {
    color: #999;
}
.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
    background-color: transparent;
    color: #fff;
}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
    background-color: #080808;
    color: #fff;
}
.navbar-inverse .navbar-nav > .disabled > a, .navbar-inverse .navbar-nav > .disabled > a:hover, .navbar-inverse .navbar-nav > .disabled > a:focus {
    background-color: transparent;
    color: #444;
}
.navbar-inverse .navbar-toggle {
    border-color: #333;
}
.navbar-inverse .navbar-toggle:hover, .navbar-inverse .navbar-toggle:focus {
    background-color: #333;
}
.navbar-inverse .navbar-toggle .icon-bar {
    background-color: #fff;
}
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #101010;
}
.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
    background-color: #080808;
    color: #fff;
}
.navbar-inverse .navbar-nav > .dropdown > a:hover .caret {
    border-bottom-color: #fff;
    border-top-color: #fff;
}
.navbar-inverse .navbar-nav > .dropdown > a .caret {
    border-bottom-color: #999;
    border-top-color: #999;
}
.navbar-inverse .navbar-nav > .open > a .caret, .navbar-inverse .navbar-nav > .open > a:hover .caret, .navbar-inverse .navbar-nav > .open > a:focus .caret {
    border-bottom-color: #fff;
    border-top-color: #fff;
}
@media (max-width: 767px) {
.navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
    border-color: #080808;
}
.navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
    color: #999;
}
.navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
    background-color: transparent;
    color: #fff;
}
.navbar-inverse .navbar-nav .open .dropdown-menu > .active > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
    background-color: #080808;
    color: #fff;
}
.navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    background-color: transparent;
    color: #444;
}
}
.navbar-inverse .navbar-link {
    color: #999;
}
.navbar-inverse .navbar-link:hover {
    color: #fff;
}
.breadcrumb {
    background-color: #f5f5f5;
    border-radius: 4px;
    list-style: outside none none;
    margin-bottom: 20px;
    padding: 8px 15px;
}
.breadcrumb > li {
    display: inline-block;
}
.breadcrumb > li + li::before {
    color: #ccc;
    content: "/ ";
    padding: 0 5px;
}
.breadcrumb > .active {
    color: #999;
}
.pagination {
    border-radius: 4px;
    display: inline-block;
    margin: 20px 0;
    padding-left: 0;
}
.pagination > li {
    display: inline;
}
.pagination > li > a, .pagination > li > span {
    background-color: #fff;
    border: 1px solid #ddd;
    float: left;
    line-height: 1.42857;
    margin-left: -1px;
    padding: 6px 12px;
    position: relative;
    text-decoration: none;
}
.pagination > li:first-child > a, .pagination > li:first-child > span {
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px;
    margin-left: 0;
}
.pagination > li:last-child > a, .pagination > li:last-child > span {
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
}
.pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus {
    background-color: #eee;
}
.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
    background-color: #428bca;
    border-color: #428bca;
    color: #fff;
    cursor: default;
    z-index: 2;
}
.pagination > .disabled > span, .pagination > .disabled > a, .pagination > .disabled > a:hover, .pagination > .disabled > a:focus {
    background-color: #fff;
    border-color: #ddd;
    color: #999;
    cursor: not-allowed;
}
.pagination-lg > li > a, .pagination-lg > li > span {
    font-size: 18px;
    padding: 10px 16px;
}
.pagination-lg > li:first-child > a, .pagination-lg > li:first-child > span {
    border-bottom-left-radius: 6px;
    border-top-left-radius: 6px;
}
.pagination-lg > li:last-child > a, .pagination-lg > li:last-child > span {
    border-bottom-right-radius: 6px;
    border-top-right-radius: 6px;
}
.pagination-sm > li > a, .pagination-sm > li > span {
    font-size: 12px;
    padding: 5px 10px;
}
.pagination-sm > li:first-child > a, .pagination-sm > li:first-child > span {
    border-bottom-left-radius: 3px;
    border-top-left-radius: 3px;
}
.pagination-sm > li:last-child > a, .pagination-sm > li:last-child > span {
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
}
.pager {
    list-style: outside none none;
    margin: 20px 0;
    padding-left: 0;
    text-align: center;
}
.pager::before, .pager::after {
    content: " ";
    display: table;
}
.pager::after {
    clear: both;
}
.pager::before, .pager::after {
    content: " ";
    display: table;
}
.pager::after {
    clear: both;
}
.pager li {
    display: inline;
}
.pager li > a, .pager li > span {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 15px;
    display: inline-block;
    padding: 5px 14px;
}
.pager li > a:hover, .pager li > a:focus {
    background-color: #eee;
    text-decoration: none;
}
.pager .next > a, .pager .next > span {
    float: right;
}
.pager .previous > a, .pager .previous > span {
    float: left;
}
.pager .disabled > a, .pager .disabled > a:hover, .pager .disabled > a:focus, .pager .disabled > span {
    background-color: #fff;
    color: #999;
    cursor: not-allowed;
}
.label {
    border-radius: 0.25em;
    color: #fff;
    display: inline;
    font-size: 75%;
    font-weight: bold;
    line-height: 1;
    padding: 0.2em 0.6em 0.3em;
    text-align: center;
    vertical-align: baseline;
    white-space: nowrap;
}
.label[href]:hover, .label[href]:focus {
    color: #fff;
    cursor: pointer;
    text-decoration: none;
}
.label:empty {
    display: none;
}
.label-default {
    background-color: #999;
}
.label-default[href]:hover, .label-default[href]:focus {
    background-color: #808080;
}
.label-primary {
    background-color: #428bca;
}
.label-primary[href]:hover, .label-primary[href]:focus {
    background-color: #3071a9;
}
.label-success {
    background-color: #5cb85c;
}
.label-success[href]:hover, .label-success[href]:focus {
    background-color: #449d44;
}
.label-info {
    background-color: #5bc0de;
}
.label-info[href]:hover, .label-info[href]:focus {
    background-color: #31b0d5;
}
.label-warning {
    background-color: #f0ad4e;
}
.label-warning[href]:hover, .label-warning[href]:focus {
    background-color: #ec971f;
}
.label-danger {
    background-color: #d9534f;
}
.label-danger[href]:hover, .label-danger[href]:focus {
    background-color: #c9302c;
}
.badge {
    background-color: #999;
    border-radius: 10px;
    color: #fff;
    display: inline-block;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    min-width: 10px;
    padding: 3px 7px;
    text-align: center;
    vertical-align: baseline;
    white-space: nowrap;
}
.badge:empty {
    display: none;
}
a.badge:hover, a.badge:focus {
    color: #fff;
    cursor: pointer;
    text-decoration: none;
}
.btn .badge {
    position: relative;
    top: -1px;
}
a.list-group-item.active > .badge, .nav-pills > .active > a > .badge {
    background-color: #fff;
    color: #428bca;
}
.nav-pills > li > a > .badge {
    margin-left: 3px;
}
.jumbotron {
    background-color: #eee;
    color: inherit;
    font-size: 21px;
    font-weight: 200;
    line-height: 2.14286;
    margin-bottom: 30px;
    padding: 30px;
}
.jumbotron h1 {
    color: inherit;
    line-height: 1;
}
.jumbotron p {
    line-height: 1.4;
}
.container .jumbotron {
    border-radius: 6px;
}
@media screen and (min-width: 768px) {
.jumbotron {
    padding-bottom: 48px;
    padding-top: 48px;
}
.container .jumbotron {
    padding-left: 60px;
    padding-right: 60px;
}
.jumbotron h1 {
    font-size: 63px;
}
}
.thumbnail {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: block;
    height: auto;
    line-height: 1.42857;
    max-width: 100%;
    padding: 4px;
    transition: all 0.2s ease-in-out 0s;
}
.thumbnail > img {
    display: block;
    height: auto;
    max-width: 100%;
}
a.thumbnail:hover, a.thumbnail:focus {
    border-color: #428bca;
}
.thumbnail > img {
    margin-left: auto;
    margin-right: auto;
}
.thumbnail .caption {
    color: #333;
    padding: 9px;
}
.alert {
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 20px;
    padding: 15px;
}
.alert h4 {
    color: inherit;
    margin-top: 0;
}
.alert .alert-link {
    font-weight: bold;
}
.alert > p, .alert > ul {
    margin-bottom: 0;
}
.alert > p + p {
    margin-top: 5px;
}
.alert-dismissable {
    padding-right: 35px;
}
.alert-dismissable .close {
    color: inherit;
    position: relative;
    right: -21px;
    top: -2px;
}
.alert-success {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #468847;
}
.alert-success hr {
    border-top-color: #c9e2b3;
}
.alert-success .alert-link {
    color: #356635;
}
.alert-info {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #3a87ad;
}
.alert-info hr {
    border-top-color: #a6e1ec;
}
.alert-info .alert-link {
    color: #2d6987;
}
.alert-warning {
    background-color: #fcf8e3;
    border-color: #fbeed5;
    color: #c09853;
}
.alert-warning hr {
    border-top-color: #f8e5be;
}
.alert-warning .alert-link {
    color: #a47e3c;
}
.alert-danger {
    background-color: #f2dede;
    border-color: #eed3d7;
    color: #b94a48;
}
.alert-danger hr {
    border-top-color: #e6c1c7;
}
.alert-danger .alert-link {
    color: #953b39;
}
@keyframes progress-bar-stripes {
0% {
    background-position: 40px 0;
}
100% {
    background-position: 0 0;
}
}
@keyframes progress-bar-stripes {
0% {
    background-position: 40px 0;
}
100% {
    background-position: 0 0;
}
}
.progress {
    background-color: #f5f5f5;
    border-radius: 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
    height: 20px;
    margin-bottom: 20px;
    overflow: hidden;
}
.progress-bar {
    background-color: #428bca;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset;
    color: #fff;
    float: left;
    font-size: 12px;
    height: 100%;
    text-align: center;
    transition: width 0.6s ease 0s;
    width: 0;
}
.progress-striped .progress-bar {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-size: 40px 40px;
}
.progress.active .progress-bar {
    animation: 2s linear 0s normal none infinite running progress-bar-stripes;
}
.progress-bar-success {
    background-color: #5cb85c;
}
.progress-striped .progress-bar-success {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-info {
    background-color: #5bc0de;
}
.progress-striped .progress-bar-info {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-warning {
    background-color: #f0ad4e;
}
.progress-striped .progress-bar-warning {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-danger {
    background-color: #d9534f;
}
.progress-striped .progress-bar-danger {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.media, .media-body {
    overflow: hidden;
}
.media, .media .media {
    margin-top: 15px;
}
.media:first-child {
    margin-top: 0;
}
.media-object {
    display: block;
}
.media-heading {
    margin: 0 0 5px;
}
.media > .pull-left {
    margin-right: 10px;
}
.media > .pull-right {
    margin-left: 10px;
}
.media-list {
    list-style: outside none none;
    padding-left: 0;
}
.list-group {
    margin-bottom: 20px;
    padding-left: 0;
}
.list-group-item {
    background-color: #fff;
    border: 1px solid #ddd;
    display: block;
    margin-bottom: -1px;
    padding: 10px 15px;
    position: relative;
}
.list-group-item:first-child {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
.list-group-item:last-child {
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    margin-bottom: 0;
}
.list-group-item > .badge {
    float: right;
}
.list-group-item > .badge + .badge {
    margin-right: 5px;
}
a.list-group-item {
    color: #555;
}
a.list-group-item .list-group-item-heading {
    color: #333;
}
a.list-group-item:hover, a.list-group-item:focus {
    background-color: #f5f5f5;
    text-decoration: none;
}
.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    background-color: #428bca;
    border-color: #428bca;
    color: #fff;
    z-index: 2;
}
.list-group-item.active .list-group-item-heading, .list-group-item.active:hover .list-group-item-heading, .list-group-item.active:focus .list-group-item-heading {
    color: inherit;
}
.list-group-item.active .list-group-item-text, .list-group-item.active:hover .list-group-item-text, .list-group-item.active:focus .list-group-item-text {
    color: #e1edf7;
}
.list-group-item-heading {
    margin-bottom: 5px;
    margin-top: 0;
}
.list-group-item-text {
    line-height: 1.3;
    margin-bottom: 0;
}
.panel {
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
}
.panel-body {
    padding: 15px;
}
.panel-body::before, .panel-body::after {
    content: " ";
    display: table;
}
.panel-body::after {
    clear: both;
}
.panel-body::before, .panel-body::after {
    content: " ";
    display: table;
}
.panel-body::after {
    clear: both;
}
.panel > .list-group {
    margin-bottom: 0;
}
.panel > .list-group .list-group-item {
    border-width: 1px 0;
}
.panel > .list-group .list-group-item:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.panel > .list-group .list-group-item:last-child {
    border-bottom: 0 none;
}
.panel-heading + .list-group .list-group-item:first-child {
    border-top-width: 0;
}
.panel > .table {
    margin-bottom: 0;
}
.panel > .panel-body + .table {
    border-top: 1px solid #ddd;
}
.panel-heading {
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    padding: 10px 15px;
}
.panel-title {
    font-size: 16px;
    margin-bottom: 0;
    margin-top: 0;
}
.panel-title > a {
    color: inherit;
}
.panel-footer {
    background-color: #f5f5f5;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    border-top: 1px solid #ddd;
    padding: 10px 15px;
}
.panel-group .panel {
    border-radius: 4px;
    margin-bottom: 0;
    overflow: hidden;
}
.panel-group .panel + .panel {
    margin-top: 5px;
}
.panel-group .panel-heading {
    border-bottom: 0 none;
}
.panel-group .panel-heading + .panel-collapse .panel-body {
    border-top: 1px solid #ddd;
}
.panel-group .panel-footer {
    border-top: 0 none;
}
.panel-group .panel-footer + .panel-collapse .panel-body {
    border-bottom: 1px solid #ddd;
}
.panel-default {
    border-color: #ddd;
}
.panel-default > .panel-heading {
    background-color: #f5f5f5;
    border-color: #ddd;
    color: #333;
}
.panel-default > .panel-heading + .panel-collapse .panel-body {
    border-top-color: #ddd;
}
.panel-default > .panel-footer + .panel-collapse .panel-body {
    border-bottom-color: #ddd;
}
.panel-primary {
    border-color: #428bca;
}
.panel-primary > .panel-heading {
    background-color: #428bca;
    border-color: #428bca;
    color: #fff;
}
.panel-primary > .panel-heading + .panel-collapse .panel-body {
    border-top-color: #428bca;
}
.panel-primary > .panel-footer + .panel-collapse .panel-body {
    border-bottom-color: #428bca;
}
.panel-success {
    border-color: #d6e9c6;
}
.panel-success > .panel-heading {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #468847;
}
.panel-success > .panel-heading + .panel-collapse .panel-body {
    border-top-color: #d6e9c6;
}
.panel-success > .panel-footer + .panel-collapse .panel-body {
    border-bottom-color: #d6e9c6;
}
.panel-warning {
    border-color: #fbeed5;
}
.panel-warning > .panel-heading {
    background-color: #fcf8e3;
    border-color: #fbeed5;
    color: #c09853;
}
.panel-warning > .panel-heading + .panel-collapse .panel-body {
    border-top-color: #fbeed5;
}
.panel-warning > .panel-footer + .panel-collapse .panel-body {
    border-bottom-color: #fbeed5;
}
.panel-danger {
    border-color: #eed3d7;
}
.panel-danger > .panel-heading {
    background-color: #f2dede;
    border-color: #eed3d7;
    color: #b94a48;
}
.panel-danger > .panel-heading + .panel-collapse .panel-body {
    border-top-color: #eed3d7;
}
.panel-danger > .panel-footer + .panel-collapse .panel-body {
    border-bottom-color: #eed3d7;
}
.panel-info {
    border-color: #bce8f1;
}
.panel-info > .panel-heading {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #3a87ad;
}
.panel-info > .panel-heading + .panel-collapse .panel-body {
    border-top-color: #bce8f1;
}
.panel-info > .panel-footer + .panel-collapse .panel-body {
    border-bottom-color: #bce8f1;
}
.well {
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;
    margin-bottom: 20px;
    min-height: 20px;
    padding: 19px;
}
.well blockquote {
    border-color: rgba(0, 0, 0, 0.15);
}
.well-lg {
    border-radius: 6px;
    padding: 24px;
}
.well-sm {
    border-radius: 3px;
    padding: 9px;
}
.close {
    color: #000;
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    opacity: 0.2;
    text-shadow: 0 1px 0 #fff;
}
.close:hover, .close:focus {
    color: #000;
    cursor: pointer;
    opacity: 0.5;
    text-decoration: none;
}
button.close {
    background: transparent none repeat scroll 0 0;
    border: 0 none;
    cursor: pointer;
    padding: 0;
}
.modal-open {
    overflow: hidden;
}
body.modal-open, .modal-open .navbar-fixed-top, .modal-open .navbar-fixed-bottom {
    margin-right: 15px;
}
.modal {
    bottom: 0;
    display: none;
    left: 0;
    overflow-x: auto;
    overflow-y: scroll;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1040;
}
.modal.fade .modal-dialog {
    transform: translate(0px, -25%);
    transition: transform 0.3s ease-out 0s;
}
.modal.in .modal-dialog {
    transform: translate(0px, 0px);
}
.modal-dialog {
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
    width: auto;
    z-index: 1050;
}
.modal-content {
    background-clip: padding-box;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    outline: 0 none;
    position: relative;
}
.modal-backdrop {
    background-color: #000;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1030;
}
.modal-backdrop.fade {
    opacity: 0;
}
.modal-backdrop.in {
    opacity: 0.5;
}
.modal-header {
    border-bottom: 1px solid #e5e5e5;
    min-height: 16.4286px;
    padding: 15px;
}
.modal-header .close {
    margin-top: -2px;
}
.modal-title {
    line-height: 1.42857;
    margin: 0;
}
.modal-body {
    padding: 20px;
    position: relative;
}
.modal-footer {
    border-top: 1px solid #e5e5e5;
    margin-top: 15px;
    padding: 19px 20px 20px;
    text-align: right;
}
.modal-footer::before, .modal-footer::after {
    content: " ";
    display: table;
}
.modal-footer::after {
    clear: both;
}
.modal-footer::before, .modal-footer::after {
    content: " ";
    display: table;
}
.modal-footer::after {
    clear: both;
}
.modal-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 5px;
}
.modal-footer .btn-group .btn + .btn {
    margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
    margin-left: 0;
}
@media screen and (min-width: 768px) {
.modal-dialog {
    left: 50%;
    padding-bottom: 30px;
    padding-top: 30px;
    right: auto;
    width: 600px;
}
.modal-content {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
}
}
.tooltip {
    display: block;
    font-size: 12px;
    line-height: 1.4;
    opacity: 0;
    position: absolute;
    visibility: visible;
    z-index: 1030;
}
.tooltip.in {
    opacity: 0.9;
}
.tooltip.top {
    margin-top: -3px;
    padding: 5px 0;
}
.tooltip.right {
    margin-left: 3px;
    padding: 0 5px;
}
.tooltip.bottom {
    margin-top: 3px;
    padding: 5px 0;
}
.tooltip.left {
    margin-left: -3px;
    padding: 0 5px;
}
.tooltip-inner {
    background-color: #000;
    border-radius: 4px;
    color: #fff;
    max-width: 200px;
    padding: 3px 8px;
    text-align: center;
    text-decoration: none;
}
.tooltip-arrow {
    border-color: transparent;
    border-style: solid;
    height: 0;
    position: absolute;
    width: 0;
}
.tooltip.top .tooltip-arrow {
    border-top-color: #000;
    border-width: 5px 5px 0;
    bottom: 0;
    left: 50%;
    margin-left: -5px;
}
.tooltip.top-left .tooltip-arrow {
    border-top-color: #000;
    border-width: 5px 5px 0;
    bottom: 0;
    left: 5px;
}
.tooltip.top-right .tooltip-arrow {
    border-top-color: #000;
    border-width: 5px 5px 0;
    bottom: 0;
    right: 5px;
}
.tooltip.right .tooltip-arrow {
    border-right-color: #000;
    border-width: 5px 5px 5px 0;
    left: 0;
    margin-top: -5px;
    top: 50%;
}
.tooltip.left .tooltip-arrow {
    border-left-color: #000;
    border-width: 5px 0 5px 5px;
    margin-top: -5px;
    right: 0;
    top: 50%;
}
.tooltip.bottom .tooltip-arrow {
    border-bottom-color: #000;
    border-width: 0 5px 5px;
    left: 50%;
    margin-left: -5px;
    top: 0;
}
.tooltip.bottom-left .tooltip-arrow {
    border-bottom-color: #000;
    border-width: 0 5px 5px;
    left: 5px;
    top: 0;
}
.tooltip.bottom-right .tooltip-arrow {
    border-bottom-color: #000;
    border-width: 0 5px 5px;
    right: 5px;
    top: 0;
}
.popover {
    background-clip: padding-box;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    display: none;
    left: 0;
    max-width: 276px;
    padding: 1px;
    position: absolute;
    text-align: left;
    top: 0;
    white-space: normal;
    z-index: 1010;
}
.popover.top {
    margin-top: -10px;
}
.popover.right {
    margin-left: 10px;
}
.popover.bottom {
    margin-top: 10px;
}
.popover.left {
    margin-left: -10px;
}
.popover-title {
    background-color: #f7f7f7;
    border-bottom: 1px solid #ebebeb;
    border-radius: 5px 5px 0 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 18px;
    margin: 0;
    padding: 8px 14px;
}
.popover-content {
    padding: 9px 14px;
}
.popover .arrow, .popover .arrow::after {
    border-color: transparent;
    border-style: solid;
    display: block;
    height: 0;
    position: absolute;
    width: 0;
}
.popover .arrow {
    border-width: 11px;
}
.popover .arrow::after {
    border-width: 10px;
    content: "";
}
.popover.top .arrow {
    border-bottom-width: 0;
    border-top-color: rgba(0, 0, 0, 0.25);
    bottom: -11px;
    left: 50%;
    margin-left: -11px;
}
.popover.top .arrow::after {
    border-bottom-width: 0;
    border-top-color: #fff;
    bottom: 1px;
    content: " ";
    margin-left: -10px;
}
.popover.right .arrow {
    border-left-width: 0;
    border-right-color: rgba(0, 0, 0, 0.25);
    left: -11px;
    margin-top: -11px;
    top: 50%;
}
.popover.right .arrow::after {
    border-left-width: 0;
    border-right-color: #fff;
    bottom: -10px;
    content: " ";
    left: 1px;
}
.popover.bottom .arrow {
    border-bottom-color: rgba(0, 0, 0, 0.25);
    border-top-width: 0;
    left: 50%;
    margin-left: -11px;
    top: -11px;
}
.popover.bottom .arrow::after {
    border-bottom-color: #fff;
    border-top-width: 0;
    content: " ";
    margin-left: -10px;
    top: 1px;
}
.popover.left .arrow {
    border-left-color: rgba(0, 0, 0, 0.25);
    border-right-width: 0;
    margin-top: -11px;
    right: -11px;
    top: 50%;
}
.popover.left .arrow::after {
    border-left-color: #fff;
    border-right-width: 0;
    bottom: -10px;
    content: " ";
    right: 1px;
}
.carousel {
    position: relative;
}
.carousel-inner {
    overflow: hidden;
    position: relative;
    width: 100%;
}
.carousel-inner > .item {
    display: none;
    position: relative;
    transition: left 0.6s ease-in-out 0s;
}
.carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    height: auto;
    line-height: 1;
    max-width: 100%;
}
.carousel-inner > .active, .carousel-inner > .next, .carousel-inner > .prev {
    display: block;
}
.carousel-inner > .active {
    left: 0;
}
.carousel-inner > .next, .carousel-inner > .prev {
    position: absolute;
    top: 0;
    width: 100%;
}
.carousel-inner > .next {
    left: 100%;
}
.carousel-inner > .prev {
    left: -100%;
}
.carousel-inner > .next.left, .carousel-inner > .prev.right {
    left: 0;
}
.carousel-inner > .active.left {
    left: -100%;
}
.carousel-inner > .active.right {
    left: 100%;
}
.carousel-control {
    bottom: 0;
    color: #fff;
    font-size: 20px;
    left: 0;
    opacity: 0.5;
    position: absolute;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
    top: 0;
    width: 15%;
}
.carousel-control.left {
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5) 0px, rgba(0, 0, 0, 0) 100%);
    background-repeat: repeat-x;
}
.carousel-control.right {
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0.5) 100%);
    background-repeat: repeat-x;
    left: auto;
    right: 0;
}
.carousel-control:hover, .carousel-control:focus {
    color: #fff;
    opacity: 0.9;
    text-decoration: none;
}
.carousel-control .icon-prev, .carousel-control .icon-next, .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right {
    display: inline-block;
    left: 50%;
    position: absolute;
    top: 50%;
    z-index: 5;
}
.carousel-control .icon-prev, .carousel-control .icon-next {
    font-family: serif;
    height: 20px;
    margin-left: -10px;
    margin-top: -10px;
    width: 20px;
}
.carousel-control .icon-prev::before {
    content: "‹";
}
.carousel-control .icon-next::before {
    content: "›";
}
.carousel-indicators {
    bottom: 10px;
    left: 50%;
    list-style: outside none none;
    margin-left: -30%;
    padding-left: 0;
    position: absolute;
    text-align: center;
    width: 60%;
    z-index: 15;
}
.carousel-indicators li {
    border: 1px solid #fff;
    border-radius: 10px;
    cursor: pointer;
    display: inline-block;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    width: 10px;
}
.carousel-indicators .active {
    background-color: #fff;
    height: 12px;
    margin: 0;
    width: 12px;
}
.carousel-caption {
    bottom: 20px;
    color: #fff;
    left: 15%;
    padding-bottom: 20px;
    padding-top: 20px;
    position: absolute;
    right: 15%;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
    z-index: 10;
}
.carousel-caption .btn {
    text-shadow: none;
}
@media screen and (min-width: 768px) {
.carousel-control .icon-prev, .carousel-control .icon-next {
    font-size: 30px;
    height: 30px;
    margin-left: -15px;
    margin-top: -15px;
    width: 30px;
}
.carousel-caption {
    left: 20%;
    padding-bottom: 30px;
    right: 20%;
}
.carousel-indicators {
    bottom: 20px;
}
}
.clearfix::before, .clearfix::after {
    content: " ";
    display: table;
}
.clearfix::after {
    clear: both;
}
.pull-right {
    float: right !important;
}
.pull-left {
    float: left !important;
}
.hide {
    display: none !important;
}
.show {
    display: block !important;
}
.invisible {
    visibility: hidden;
}
.text-hide {
    background-color: transparent;
    border: 0 none;
    color: transparent;
    font: 0px/0 a;
    text-shadow: none;
}
.affix {
    position: fixed;
}
@media screen and (max-width: 400px) {
}
.hidden {
    display: none !important;
    visibility: hidden !important;
}
.visible-xs {
    display: none !important;
}
tr.visible-xs {
    display: none !important;
}
th.visible-xs, td.visible-xs {
    display: none !important;
}
@media (max-width: 767px) {
.visible-xs {
    display: block !important;
}
tr.visible-xs {
    display: table-row !important;
}
th.visible-xs, td.visible-xs {
    display: table-cell !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.visible-xs.visible-sm {
    display: block !important;
}
tr.visible-xs.visible-sm {
    display: table-row !important;
}
th.visible-xs.visible-sm, td.visible-xs.visible-sm {
    display: table-cell !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.visible-xs.visible-md {
    display: block !important;
}
tr.visible-xs.visible-md {
    display: table-row !important;
}
th.visible-xs.visible-md, td.visible-xs.visible-md {
    display: table-cell !important;
}
}
@media (min-width: 1200px) {
.visible-xs.visible-lg {
    display: block !important;
}
tr.visible-xs.visible-lg {
    display: table-row !important;
}
th.visible-xs.visible-lg, td.visible-xs.visible-lg {
    display: table-cell !important;
}
}
.visible-sm {
    display: none !important;
}
tr.visible-sm {
    display: none !important;
}
th.visible-sm, td.visible-sm {
    display: none !important;
}
@media (max-width: 767px) {
.visible-sm.visible-xs {
    display: block !important;
}
tr.visible-sm.visible-xs {
    display: table-row !important;
}
th.visible-sm.visible-xs, td.visible-sm.visible-xs {
    display: table-cell !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.visible-sm {
    display: block !important;
}
tr.visible-sm {
    display: table-row !important;
}
th.visible-sm, td.visible-sm {
    display: table-cell !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.visible-sm.visible-md {
    display: block !important;
}
tr.visible-sm.visible-md {
    display: table-row !important;
}
th.visible-sm.visible-md, td.visible-sm.visible-md {
    display: table-cell !important;
}
}
@media (min-width: 1200px) {
.visible-sm.visible-lg {
    display: block !important;
}
tr.visible-sm.visible-lg {
    display: table-row !important;
}
th.visible-sm.visible-lg, td.visible-sm.visible-lg {
    display: table-cell !important;
}
}
.visible-md {
    display: none !important;
}
tr.visible-md {
    display: none !important;
}
th.visible-md, td.visible-md {
    display: none !important;
}
@media (max-width: 767px) {
.visible-md.visible-xs {
    display: block !important;
}
tr.visible-md.visible-xs {
    display: table-row !important;
}
th.visible-md.visible-xs, td.visible-md.visible-xs {
    display: table-cell !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.visible-md.visible-sm {
    display: block !important;
}
tr.visible-md.visible-sm {
    display: table-row !important;
}
th.visible-md.visible-sm, td.visible-md.visible-sm {
    display: table-cell !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.visible-md {
    display: block !important;
}
tr.visible-md {
    display: table-row !important;
}
th.visible-md, td.visible-md {
    display: table-cell !important;
}
}
@media (min-width: 1200px) {
.visible-md.visible-lg {
    display: block !important;
}
tr.visible-md.visible-lg {
    display: table-row !important;
}
th.visible-md.visible-lg, td.visible-md.visible-lg {
    display: table-cell !important;
}
}
.visible-lg {
    display: none !important;
}
tr.visible-lg {
    display: none !important;
}
th.visible-lg, td.visible-lg {
    display: none !important;
}
@media (max-width: 767px) {
.visible-lg.visible-xs {
    display: block !important;
}
tr.visible-lg.visible-xs {
    display: table-row !important;
}
th.visible-lg.visible-xs, td.visible-lg.visible-xs {
    display: table-cell !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.visible-lg.visible-sm {
    display: block !important;
}
tr.visible-lg.visible-sm {
    display: table-row !important;
}
th.visible-lg.visible-sm, td.visible-lg.visible-sm {
    display: table-cell !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.visible-lg.visible-md {
    display: block !important;
}
tr.visible-lg.visible-md {
    display: table-row !important;
}
th.visible-lg.visible-md, td.visible-lg.visible-md {
    display: table-cell !important;
}
}
@media (min-width: 1200px) {
.visible-lg {
    display: block !important;
}
tr.visible-lg {
    display: table-row !important;
}
th.visible-lg, td.visible-lg {
    display: table-cell !important;
}
}
.hidden-xs {
    display: block !important;
}
tr.hidden-xs {
    display: table-row !important;
}
th.hidden-xs, td.hidden-xs {
    display: table-cell !important;
}
@media (max-width: 767px) {
.hidden-xs {
    display: none !important;
}
tr.hidden-xs {
    display: none !important;
}
th.hidden-xs, td.hidden-xs {
    display: none !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.hidden-xs.hidden-sm {
    display: none !important;
}
tr.hidden-xs.hidden-sm {
    display: none !important;
}
th.hidden-xs.hidden-sm, td.hidden-xs.hidden-sm {
    display: none !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.hidden-xs.hidden-md {
    display: none !important;
}
tr.hidden-xs.hidden-md {
    display: none !important;
}
th.hidden-xs.hidden-md, td.hidden-xs.hidden-md {
    display: none !important;
}
}
@media (min-width: 1200px) {
.hidden-xs.hidden-lg {
    display: none !important;
}
tr.hidden-xs.hidden-lg {
    display: none !important;
}
th.hidden-xs.hidden-lg, td.hidden-xs.hidden-lg {
    display: none !important;
}
}
.hidden-sm {
    display: block !important;
}
tr.hidden-sm {
    display: table-row !important;
}
th.hidden-sm, td.hidden-sm {
    display: table-cell !important;
}
@media (max-width: 767px) {
.hidden-sm.hidden-xs {
    display: none !important;
}
tr.hidden-sm.hidden-xs {
    display: none !important;
}
th.hidden-sm.hidden-xs, td.hidden-sm.hidden-xs {
    display: none !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.hidden-sm {
    display: none !important;
}
tr.hidden-sm {
    display: none !important;
}
th.hidden-sm, td.hidden-sm {
    display: none !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.hidden-sm.hidden-md {
    display: none !important;
}
tr.hidden-sm.hidden-md {
    display: none !important;
}
th.hidden-sm.hidden-md, td.hidden-sm.hidden-md {
    display: none !important;
}
}
@media (min-width: 1200px) {
.hidden-sm.hidden-lg {
    display: none !important;
}
tr.hidden-sm.hidden-lg {
    display: none !important;
}
th.hidden-sm.hidden-lg, td.hidden-sm.hidden-lg {
    display: none !important;
}
}
.hidden-md {
    display: block !important;
}
tr.hidden-md {
    display: table-row !important;
}
th.hidden-md, td.hidden-md {
    display: table-cell !important;
}
@media (max-width: 767px) {
.hidden-md.hidden-xs {
    display: none !important;
}
tr.hidden-md.hidden-xs {
    display: none !important;
}
th.hidden-md.hidden-xs, td.hidden-md.hidden-xs {
    display: none !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.hidden-md.hidden-sm {
    display: none !important;
}
tr.hidden-md.hidden-sm {
    display: none !important;
}
th.hidden-md.hidden-sm, td.hidden-md.hidden-sm {
    display: none !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.hidden-md {
    display: none !important;
}
tr.hidden-md {
    display: none !important;
}
th.hidden-md, td.hidden-md {
    display: none !important;
}
}
@media (min-width: 1200px) {
.hidden-md.hidden-lg {
    display: none !important;
}
tr.hidden-md.hidden-lg {
    display: none !important;
}
th.hidden-md.hidden-lg, td.hidden-md.hidden-lg {
    display: none !important;
}
}
.hidden-lg {
    display: block !important;
}
tr.hidden-lg {
    display: table-row !important;
}
th.hidden-lg, td.hidden-lg {
    display: table-cell !important;
}
@media (max-width: 767px) {
.hidden-lg.hidden-xs {
    display: none !important;
}
tr.hidden-lg.hidden-xs {
    display: none !important;
}
th.hidden-lg.hidden-xs, td.hidden-lg.hidden-xs {
    display: none !important;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.hidden-lg.hidden-sm {
    display: none !important;
}
tr.hidden-lg.hidden-sm {
    display: none !important;
}
th.hidden-lg.hidden-sm, td.hidden-lg.hidden-sm {
    display: none !important;
}
}
@media (min-width: 992px) and (max-width: 1199px) {
.hidden-lg.hidden-md {
    display: none !important;
}
tr.hidden-lg.hidden-md {
    display: none !important;
}
th.hidden-lg.hidden-md, td.hidden-lg.hidden-md {
    display: none !important;
}
}
@media (min-width: 1200px) {
.hidden-lg {
    display: none !important;
}
tr.hidden-lg {
    display: none !important;
}
th.hidden-lg, td.hidden-lg {
    display: none !important;
}
}
.visible-print {
    display: none !important;
}
tr.visible-print {
    display: none !important;
}
th.visible-print, td.visible-print {
    display: none !important;
}
@media print {
.visible-print {
    display: block !important;
}
tr.visible-print {
    display: table-row !important;
}
th.visible-print, td.visible-print {
    display: table-cell !important;
}
.hidden-print {
    display: none !important;
}
tr.hidden-print {
    display: none !important;
}
th.hidden-print, td.hidden-print {
    display: none !important;
}
}
</sytle>';
 $html.='<div class="row">    
<div class="col-lg-3">
		
			
				<div class="row">
				<div class="col-xs-13">
					<table class="table  table-hover">
						<tr><td class="success">Action</td></tr>
						<tr><td class="success">Brand</td></tr>
                        <tr><td class="success">Quality</td></tr>
                        <tr><td class="success">Color</td></tr>
                         <tr><td class="success">Dimension</td></tr>';
                        
                    foreach($mixingraws as $mixing):
                            $html.='<tr>';
                            $html.='<td>';
                            $html.=$mixing['consumption_stock']['material_id'];
                            $html.='</td>';
                            $html.='</tr>';
                            endforeach;
                            
                        $html.='<tr><td>Total</td></tr>
                        
                        </table>
					</div>
									</div>
		
			
				</div>';


$i=1;
$flag=0;
$count=1;

foreach ($consumptionStocks as $consumptionStock): 
if($i<=1)
{
        $html.= '<div class="col-lg-2">';
	    $html.= '<table class="table">';
	    $html.= '<tr><td class="success">'.$consumptionStock['ConsumptionStock']['brand'].'</td></tr>';
	 $html.='<tr><td class="success">'.$consumptionStock['ConsumptionStock']['quality_id'].'</td></tr>';
	$html.= '<tr><td class="success">'.$consumptionStock['ConsumptionStock']['color'].'</td></tr>';
    $html.= '<tr><td class="success">'.$consumptionStock['ConsumptionStock']['dimension'].'</td></tr>';

     
    $i=2;
   $flag++;    
   
    
}
    
       
    if($flag<32)
    {
     
            
        $html.= '<tr>';
      
    //echo '<td>'.$consumptionStock['ConsumptionStock']['material_id'].'</td>';
    $html.= '<td class="xedit" id="'.$consumptionStock['ConsumptionStock']['consumption_id'].'" key="quantity">'.$consumptionStock['ConsumptionStock']['quantity'].'</td>';
          
      
        $html.= '</tr>';
        
    $flag=$flag+1;
		

    }
        else
       {
       //from this line  i need to break the table  
           $html.= '<tr>';
		   $html.='<td class="xedit" id="'.$consumptionStock['ConsumptionStock']['consumption_id'].'" key="quantity">'.$consumptionStock['ConsumptionStock']['quantity'].'</td>';
		    $html.= '</tr>';
	$html.= '<tr>';
		   $html.= '<td id="'.$consumptionStock['ConsumptionStock']['total'].'" key="quantity"><strong>'.number_format($consumptionStock['ConsumptionStock']['total'],2).'</strong></td>';
		    $html.='</tr>';
			
        $i=1;
        $flag=0;
		$count=1;
            $html.= '</table>';
			
            $html.= '</div>';
    }
  




endforeach;


$html.='</div>';

 



?>
