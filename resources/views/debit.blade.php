<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>1. Invoice.xlsm</title>
    <meta name="author" content="Alkesh" />
    <meta name="title" content="1. Invoice.xlsm" />
    <meta name="company" content="Microsoft Corporation" />
    <style type="text/css">
        html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
        table { border-collapse:collapse; page-break-after:always }
        #rupee {
            font-family: DejaVu Sans;
        }
        .gridlines td { border:1px dotted black }
        .gridlines th { border:1px dotted black }
        .b { text-align:center }
        .e { text-align:center }
        .f { text-align:right }
        .inlineStr { text-align:left }
        .n { text-align:right }
        .s { text-align:left }
        td.style0 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
        th.style0 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Times New Roman'; font-size:10pt; background-color:white }
        td.style1 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style1 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style2 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style2 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style3 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style3 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style4 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style4 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style5 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style5 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style6 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style6 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style7 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style7 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style8 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style8 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style9 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        th.style9 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        td.style10 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style10 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style11 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        th.style11 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        td.style12 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        th.style12 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        td.style13 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style13 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style14 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style14 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style15 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style15 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style16 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style16 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style17 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style17 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style18 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style18 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style19 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style19 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style20 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style20 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style21 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style21 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style22 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style22 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style23 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style23 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style24 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style24 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style25 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style25 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style26 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style26 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style27 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style27 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style28 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style28 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style29 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style29 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style30 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style30 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style31 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style31 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style32 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style32 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style33 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style33 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style34 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style34 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style35 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        th.style35 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Rupee Foradian'; font-size:11pt; background-color:white }
        td.style36 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style36 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style37 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style37 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style38 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style38 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style39 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style39 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style40 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:white }
        th.style40 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; text-decoration:underline; color:#000000; font-family:'Calibri'; font-size:24pt; background-color:white }
        td.style41 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style41 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style42 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style42 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style43 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style43 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style44 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style44 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style45 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style45 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style46 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style46 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style47 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style47 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style48 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style48 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style49 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style49 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style50 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style50 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style51 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style51 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style52 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style52 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style53 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style53 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style54 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style54 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style55 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style55 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style56 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style56 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style57 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style57 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style58 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style58 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style59 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style59 { vertical-align:top; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style60 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style60 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style61 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style61 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style62 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style62 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style63 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style63 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style64 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style64 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style65 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style65 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style66 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style66 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style67 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style67 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style68 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style68 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style69 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
        th.style69 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
        td.style70 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
        th.style70 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
        td.style71 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
        th.style71 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:8pt; background-color:white }
        td.style72 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style72 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style73 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style73 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style74 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style74 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style75 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style75 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style76 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style76 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style77 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        th.style77 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
        td.style78 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style78 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style79 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style79 { vertical-align:top; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style80 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style80 { vertical-align:top; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style81 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style81 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style82 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style82 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style83 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style83 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style84 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style84 { vertical-align:top; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style85 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        th.style85 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        td.style86 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        th.style86 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        td.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        th.style87 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        td.style88 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        th.style88 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        td.style89 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        th.style89 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        td.style90 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        th.style90 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Calibri'; font-size:20pt; background-color:white }
        table.sheet0 col.col0 { width:21.01111087pt }
        table.sheet0 col.col1 { width:60.32222153pt }
        table.sheet0 col.col2 { width:158.59999818pt }
        table.sheet0 col.col3 { width:52.18888829pt }
        table.sheet0 col.col4 { width:28.46666634pt }
        table.sheet0 col.col5 { width:47.4444439pt }
        table.sheet0 col.col6 { width:52.18888829pt }
        table.sheet0 col.col7 { width:39.98888843pt }
        table.sheet0 tr { height:13.636363636364pt }
        table.sheet0 tr.row1 { height:31.5pt }
        table.sheet0 tr.row6 { height:15pt }
        table.sheet0 tr.row7 { height:15pt }
        table.sheet0 tr.row8 { height:15pt }
        table.sheet0 tr.row9 { height:15pt }
        table.sheet0 tr.row10 { height:15pt }
        table.sheet0 tr.row11 { height:15pt }
        table.sheet0 tr.row12 { height:15pt }
        table.sheet0 tr.row14 { height:15pt }
        table.sheet0 tr.row15 { height:15pt }
        table.sheet0 tr.row16 { height:15pt }
        table.sheet0 tr.row18 { height:15pt }
        table.sheet0 tr.row19 { height:15pt }
        table.sheet0 tr.row20 { height:30pt }
        table.sheet0 tr.row21 { height:15pt }
        table.sheet0 tr.row33 { height:15pt }
        table.sheet0 tr.row35 { height:15pt }
        table.sheet0 tr.row36 { height:15pt }
        table.sheet0 tr.row39 { height:15pt }
        table.sheet0 tr.row40 { height:15pt }
        table.sheet0 tr.row41 { height:15pt }
        table.sheet0 tr.row42 { height:15pt }
        table.sheet0 tr.row43 { height:15pt }
        table.sheet0 tr.row44 { height:15pt }
        table.sheet0 tr.row45 { height:15pt }
        table.sheet0 tr.row46 { height:15pt }
        table.sheet0 tr.row47 { height:15pt }
        table.sheet0 tr.row48 { height:15pt }
    </style>
</head>

<body>
<style>
    @page { margin-left: 0.70866141732283in; margin-right: 0.39370078740157in; margin-top: 0in; margin-bottom: 0.74803149606299in; }
    body { margin-left: 0.70866141732283in; margin-right: 0.39370078740157in; margin-top: 0in; margin-bottom: 0.74803149606299in; }
</style>
<table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
    <col class="col0">
    <col class="col1">
    <col class="col2">
    <col class="col3">
    <col class="col4">
    <col class="col5">
    <col class="col6">
    <col class="col7">
    <tbody>
    <tr class="row1">
        <td class="column0 style40 s style40" colspan="7"><br>{{$bill['company']['name']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row2">
        <td class="column0 style80 s style80" colspan="7">CARGO HANDLING &amp; SHIPPING AGENT</td>
        <td class="column7"></td>
    </tr>
    <tr class="row3">
        <td class="column0 style80 s style80" colspan="7">Office No. 203, 2nd Floor, Plot No. 212, Ward - 12/B, Gandhidham - Kachchh</td>
        <td class="column7"></td>
    </tr>
    <tr class="row4">
        <td class="column0 style80 s style80" colspan="7">Mob. 98252 34089 , E-mail : bgrshipping@yahoo.in , Tel : 02836 232951</td>
        <td class="column7"></td>
    </tr>

    <tr class="row4">
        <td class="column0 style80 s style80" colspan="7"><br></td>
        <td class="column7"></td>
    </tr>

    <tr class="row6">
        <td class="column0 style85 s style90" colspan="3" rowspan="2">INVOICE</td>
        <td class="column3 style76 s style77" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Original for Receipient</td>
        <td class="column7"></td>
    </tr>
    <tr class="row7">
        <td class="column3 style76 s style77" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duplicate for Supplier</td>
        <td class="column7"></td>
    </tr>
    <tr class="row8">
        <td class="column0 style41 s style42" colspan="2">&nbsp;Reverse Charge    </td>
        <td class="column2 style73 s style78" colspan="5">No</td>
        <td class="column7"></td>
    </tr>
    <tr class="row9">
        <td class="column0 style56 s style57" colspan="2">&nbsp;Invoice No.&nbsp;:</td>
        <td class="column2 style44 null style45" colspan="5">{{$bill['final_bill_no']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row10">
        <td class="column0 style56 s style57" colspan="2">&nbsp;Invoice Date&nbsp;:</td>
        <td class="column2 style81 null style82" colspan="5">{{$bill['bill_date']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row11">
        <td class="column0 style56 s style57" colspan="2">&nbsp;GSTIN&nbsp;: </td>
        <td class="column2 style44 null style45" colspan="5">{{$bill['company']['gstin']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row12">
        <td class="column0 style49 s style50" colspan="2">&nbsp;State&nbsp;:</td>
        <td class="column2 style48 null style83" colspan="5">{{$bill['company']['state']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row14">
        <td class="column0 style52 s style84" colspan="7">Details of Receiver | Billed to:</td>
        <td class="column7"></td>
    </tr>
    <tr class="row15">
        <td class="column0 style41 s style42" colspan="2">&nbsp;Name&nbsp;:</td>
        <td class="column2 style73 null style78" colspan="5">{{$bill['client_address']['client']['name']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row16">
        <td class="column0 style56 s style57" colspan="2">&nbsp;Address&nbsp;:</td>
        <td class="column2 style44 null style45" colspan="5">{{$bill['client_address']['address']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row17">
        <td class="column0 style54 null style55" colspan="2">&nbsp;GSTIN&nbsp;:</td>
        <td class="column2 style44 null style45" colspan="5">{{$bill['client_address']['gstin']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row18">
        <td class="column0 style56 s style57" colspan="2">&nbsp;State&nbsp;:</td>
        <td class="column2 style44 null style45" colspan="5">{{$bill['client_address']['state']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row19">
        <td class="column0 style49 s style50" colspan="2">&nbsp;Description&nbsp;:</td>
        <td class="column2 style48 null style83" colspan="5">{{$bill['description']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row20">
        <td class="column0 style18 s"><span style="font-weight:bold; color:#000000; font-family:'Calibri'; font-size:11pt">&nbsp;Sr. No.</span></td>
        <td class="column1 style52 s style53" colspan="2">&nbsp;Name of Product / Service</td>
        <td class="column3 style25 s">Service Code</td>
        <td class="column4 style25 s">Qty</td>
        <td class="column5 style25 s">Rate <span id="rupee">&#8377;</span></td>
        <td class="column6 style17 s">Total <span id="rupee">&#8377;</span></td>
        <td class="column7"></td>
    </tr>
    <tr class="row21">
        <td class="column0 style1 n"></td>
        <td class="column1 style72 s style73" colspan="2"></td>
        <td class="column3 style36 null"></td>
        <td class="column4 style14 n"></td>
        <td class="column5 style2 n"></td>
        <td class="column6 style23 f"></td>
        <td class="column7"></td>
    </tr>
    <tr class="row22">
        <td class="column0 style3 null"></td>
        <td class="column1 style43 null style44" colspan="2"></td>
        <td class="column3 style26 null"></td>
        <td class="column4 style13 null"></td>
        <td class="column5 style4 null"></td>
        <td class="column6 style5 null"></td>
        <td class="column7">&nbsp;</td>
    </tr>

    {{$i=0}}
    @foreach ($bill['bill_detail'] as $detail)
        {{$i=$i+1}}

    <tr class="row24">
        <td class="column0 style3 null">{{$i}}</td>
        <td class="column1 style43 null style44" colspan="2">&nbsp;{{$detail['name_of_product']}}&nbsp;</td>
        <td class="column3 style26 null">&nbsp;&nbsp;{{$detail['service_code']}}</td>
        <td class="column4 style13 null">{{$detail['qty']}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="column5 style4 null">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detail['rate']}}</td>
        <td class="column6 style5 null">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$detail['total_amount']}}</td>
        <td class="column7"></td>
    </tr>
    @endforeach


    <tr class="row31">
        <td class="column0 style3 null"></td>
        <td class="column1 style43 null style44" colspan="2"></td>
        <td class="column3 style26 null"></td>
        <td class="column4 style13 null"></td>
        <td class="column5 style4 null"></td>
        <td class="column6 style5 null"></td>
        <td class="column7">&nbsp;</td>
    </tr>
    <tr class="row33">
        <td class="column0 style74 s style75" colspan="3">Total :&nbsp;</td>
        <td class="column3 style28 null"></td>
        <td class="column4 style16 f">&nbsp;&nbsp;{{$qty_total}} &nbsp;&nbsp;&nbsp;</td>
        <td class="column5 style8 null"></td>
        <td class="column6 style21 f">&nbsp;&nbsp; {{$total_amount}}&nbsp;&nbsp;&nbsp;</td>
        <td class="column7">&nbsp;</td>
    </tr>
    <tr class="row34">
        <td class="column0 style63 null style63" colspan="7"></td>
        <td class="column7">&nbsp;</td>
    </tr>
    <tr class="row35">
        <td class="column0 style41 s style42" colspan="3">&nbsp;Total Invoice Amount in Words:</td>
        <td class="column3 style41 s style42" colspan="2">Total Amount Before Tax</td>
        <td class="column5 style9 s"><span id="rupee">&#8377;</span></td>
        <td class="column6 style21 f">&nbsp;&nbsp;{{$total_amount}}&nbsp;&nbsp;&nbsp;</td>
        <td class="column7">&nbsp;</td>
    </tr>
    <tr class="row36">
        <td class="column0 style43 null style44" colspan="3">&nbsp;{{$in_words[0]}} {{ $in_words[1]}} {{ $in_words[2]}}</td>
        <td class="column3 style34 s">&nbsp;Add : CGST</td>
        <td class="column4 style10 n">9%</td>
        <td class="column5 style11 s"></td>
        <td class="column6 style22 f">&nbsp;&nbsp;{{$bill['after_cgst']}}&nbsp;&nbsp;&nbsp;</td>
        <td class="column7">&nbsp;</td>
    </tr>
    <tr class="row37">
        <td class="column0 style43 null style44" colspan="3">&nbsp;{{ $in_words[3]}} {{ $in_words[4]}} {{ $in_words[5]}} {{ $in_words[6]}}</td>
        <td class="column3 style34 s">&nbsp;Add : SGST</td>
        <td class="column4 style10 n">9%</td>
        <td class="column5 style11 s"></td>
        <td class="column6 style22 f">&nbsp;&nbsp;{{$bill['after_sgst']}}&nbsp;&nbsp;&nbsp;</td>
        <td class="column7">&nbsp;</td>
    </tr>
    <tr class="row38">
        <td class="column0 style43 null style44" colspan="3"> &nbsp;{{ $in_words[7]}} {{  $in_words[8] }} {{ $in_words[9]}} {{ $in_words[10]}}</td>
        <td class="column3 style34 s">&nbsp;Add : IGST</td>
        <td class="column4 style10 n">0%</td>
        <td class="column5 style11 s"></td>
        <td class="column6 style22 f">{{$bill['after_igst']}}&nbsp;&nbsp;&nbsp;</td>
        <td class="column7"></td>
    </tr>
    <tr class="row39">
        <td class="column0 style47 null style48" colspan="3"></td>
        <td class="column3 style49 s style50" colspan="2">&nbsp;Tax Amount : GST</td>
        <td class="column5 style12 s"><span id="rupee">&#8377;</span></td>
        <td class="column6 style21 f">&nbsp;&nbsp;{{$bill['total_gst']}}&nbsp;&nbsp;&nbsp;</td>
        <td class="column7"></td>
    </tr>
    <tr class="row40">
        <td class="column0 style51 s style51" colspan="3">: Bank Details :</td>
        <td class="column3 style52 s style53" colspan="2">Total Amount After Tax</td>
        <td class="column5 style35 s"><span id="rupee">&#8377;</span></td>
        <td class="column6 style21 f">&nbsp;&nbsp;{{$bill['final_amount']}}&nbsp;&nbsp;&nbsp;</td>
        <td class="column7"></td>
    </tr>
    <tr class="row41">
        <td class="column0 style61 s style62" colspan="2">&nbsp;Beneficiary Name</td>
        <td class="column2 style37 null">&nbsp;{{$bill['bank']['beneficiary_name']}}</td>
        <td class="column3 style63 null style63" colspan="4"></td>
        <td class="column7"></td>
    </tr>
    <tr class="row42">
        <td class="column0 style64 s style65" colspan="2">&nbsp;Bank Account No.</td>
        <td class="column2 style38 null">&nbsp;{{$bill['bank']['account_no']}}</td>
        <td class="column3 style66 s style66" colspan="3">&nbsp;GST Payable on Reverse Charge</td>
        <td class="column6 style17 s">N.A.</td>
        <td class="column7"></td>
    </tr>
    <tr class="row43">
        <td class="column0 style67 s style68" colspan="2">&nbsp;Bank Branch IFSC</td>
        <td class="column2 style39 null">&nbsp;{{$bill['bank']['branch_ifsc']}}</td>
        <td class="column3 style69 s style71" colspan="4">&nbsp;Certified that the particulars given above are true and correct.<br />
            <span style="font-weight:bold; color:#000000; font-family:'Trebuchet MS'; font-size:9pt"></span></td>
        <td class="column7"></td>
    </tr>
    <tr class="row44">
        <td class="column0 style41 s style42" colspan="3">&nbsp;Terms &amp; Conditions :</td>
        <td class="column3 style19 null"></td>
        <td class="column4 style32 null"></td>
        <td class="column5 style32 null"></td>
        <td class="column6 style33 null"></td>
        <td class="column7"></td>
    </tr>
    <tr class="row45">
        <td class="column0 style43 s style45" colspan="3">&nbsp;Interest will be charged @ 18% p.a., if the amount is not paid within 30 days.</td>
        <td class="column3 style19 null"></td>
        <td class="column4 style32 null"><img src="{{$image}}"></td>
        <td class="column5 style32 null"></td>
        <td class="column6 style33 null"></td>
        <td class="column7"></td>
    </tr>
    <tr class="row46">
        <td class="column0 style43 s style45" colspan="3">&nbsp;</td>
        <td class="column3 style46 s style46" colspan="4">&nbsp;For, {{$bill['company']['name']}}</td>
        <td class="column7"></td>
    </tr>
    <tr class="row47">
        <td class="column0 style58 null style59" colspan="3"></td>
        <td class="column3 style60 s style60" colspan="4">&nbsp;Authorised Signatory</td>
        <td class="column7"></td>
    </tr>
    <tr class="row48">
        <td class="column0 style52 s style53" colspan="3">&nbsp;Subject to Gandhidham Jurisdiction</td>
        <td class="column3 style75 s style79" colspan="4">[ E&amp;OE ]</td>
        <td class="column7"></td>
    </tr>
    <tr class="row48">
        <td class="column0 style52 s style53" colspan="3"></td>
        <td class="column3 style75 s style79" colspan="4"></td>

    </tr>
    </tbody>
</table>
</body>
</html>
