<style media="screen">

/* Base */

body, body *:not(html):not(style):not(br):not(tr):not(code) {
    font-family: Avenir, Helvetica, sans-serif;
    box-sizing: border-box;
}

body {
    background-color: #F2F4F6;
    color: #74787E;
    height: 100%;
    line-height: 1.4;
    margin: 0;
    width: 100% !important;
    -webkit-text-size-adjust: none;
}

p,
ul,
ol,
blockquote {
    line-height: 1.4;
    text-align: left;
}

a {
    color: #3869D4;
}

a img {
    border: none;
}

/* Typography */

h1 {
    color: #2F3133;
    font-size: 19px;
    font-weight: bold;
    margin-top: 0;
    text-align: left;
}

h2 {
    color: #2F3133;
    font-size: 16px;
    font-weight: bold;
    margin-top: 15px;
    text-align: left;
}

h3 {
    color: #2F3133;
    font-size: 14px;
    font-weight: bold;
    margin-top: 0;
    text-align: left;
}

p {
    color: #74787E;
    font-size: 16px;
    line-height: 1.5em;
    margin-top: 0;
    text-align: left;
}


p.sub {
    font-size: 12px;
}

img {
    max-width: 100%;
}

/* Layout */

.wrapper {
    background-color: #457B9D;
    margin: 0;
    padding: 0;
    width: 100%;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
}

.content {
    margin: 0;
    padding: 0;
    width: 100%;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
}

/* Header */

.header {
    padding: 25px 0;
    text-align: center;
}

.header a {
    color: #ffffff;
    font-size: 19px;
    text-decoration: none;
    text-shadow: 0 1px 0 white;
}

/* Body */

.body {
    background-color: #FFFFFF;
    border-bottom: 1px solid #EDEFF2;
    border-top: 1px solid #EDEFF2;
    margin: 0;
    padding: 0;
    width: 100%;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
}

.inner-body {
    background-color: #FFFFFF;
    margin: 0 auto;
    padding: 0;
    width: 570px;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 570px;
}

/* Subcopy */

.subcopy {
    border-top: 1px solid #EDEFF2;
    margin-top: 25px;
    padding-top: 25px;
}

.subcopy p {
    font-size: 12px;
}

/* Footer */

.footer {
    margin: 0 auto;
    padding: 0;
    text-align: center;
    width: 570px;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 570px;
}

.footer p {
    color: #AEAEAE;
    font-size: 12px;
    text-align: center;
}

.footer td{color: #fff;}

/* Tables */

.table table {
    margin: 30px auto;
    width: 100%;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
}

.table th {
    border-bottom: 1px solid #EDEFF2;
    padding-bottom: 8px;
}

.table td {
    color: #74787E;
    font-size: 15px;
    line-height: 18px;
    padding: 10px 0;
}

.content-cell {
    padding: 35px;
}

/* Buttons */

.action {
    margin: 30px auto;
    padding: 0;
    text-align: center;
    width: 100%;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
}

.button {
    border-radius: 3px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
    color: #FFF;
    display: inline-block;
    text-decoration: none;
    -webkit-text-size-adjust: none;
}

.button-blue {
    background-color: #3097D1;
    border-top: 10px solid #3097D1;
    border-right: 18px solid #3097D1;
    border-bottom: 10px solid #3097D1;
    border-left: 18px solid #3097D1;
}

.button-green {
    background-color: #2ab27b;
    border-top: 10px solid #2ab27b;
    border-right: 18px solid #2ab27b;
    border-bottom: 10px solid #2ab27b;
    border-left: 18px solid #2ab27b;
}

.button-red {
    background-color: #bf5329;
    border-top: 10px solid #bf5329;
    border-right: 18px solid #bf5329;
    border-bottom: 10px solid #bf5329;
    border-left: 18px solid #bf5329;
}

/* Panels */

.panel {
    margin: 0 0 21px;
}

.panel-content {
    background-color: #EDEFF2;
    padding: 16px;
}

.panel-item {
    padding: 0;
}

.panel-item p:last-of-type {
    margin-bottom: 0;
    padding-bottom: 0;
}

/* Promotions */

.promotion {
    background-color: #FFFFFF;
    border: 2px dashed #9BA2AB;
    margin: 0;
    margin-bottom: 25px;
    margin-top: 25px;
    padding: 24px;
    width: 100%;
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
}

.promotion h1 {
    text-align: center;
}

.promotion p {
    font-size: 15px;
    text-align: center;
}

p.evento{margin: 0;}
p.evento span{font-weight: bold;color: #457B9D;}
table.escala{width: 100%;border-collapse: collapse;}
table.escala tr td{padding: 4px 0;}
table.escala tr{border-bottom: 1px solid #F2F4F6;}
table.escala td.servico-img {text-align: center;}
table.escala td.servico-img img{height: 42px;}
table.escala td.servico-dsc {padding-left: 4px; font-weight: bold;font-size: 90%;}
table.escala td.colaboradores {padding-left: 4px;}
table.escala tr.lider {background-color: #457B9D;color: #ffffff;}
table.escala tr.odd{background-color: #e0e9ed;}
table.escala tr.even{background-color: #f0f5f7;}
table.escala tr.escalado{background-color: #ecf0aa;}
table.escala tr.lider.escalado {background-color: #767a1f;color: #ffffff;}

</style>