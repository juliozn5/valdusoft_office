<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <style type="text/css">
    a.comment-indicator:hover+div.comment {
      background: #ffd;
      position: absolute;
      display: block;
      border: 1px solid black;
      padding: 0.5em
    }

    div.comment {
      display: none
    }

    table {
      border-collapse: collapse;
      page-break-after: always
    }

    .gridlines td {
      border: 1px dotted black
    }

    .gridlines th {
      border: 1px dotted black
    }

    .b {
      text-align: center
    }

    .e {
      text-align: center
    }

    .f {
      text-align: right
    }

    .inlineStr {
      text-align: left
    }

    .n {
      text-align: right
    }

    .s {
      text-align: left
    }

    td.style0 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style0 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style1 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style1 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style2 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style2 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style3 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style3 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style4 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style4 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style5 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      background-color: white
    }

    th.style5 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      background-color: white
    }

    td.style6 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style6 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style7 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style7 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style8 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style8 {
      vertical-align: top;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style9 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style9 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style10 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: #FFFFFF
    }

    th.style10 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: #FFFFFF
    }

    td.style11 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style11 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style12 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      background-color: white
    }

    th.style12 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      background-color: white
    }

    td.style13 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style13 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style14 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style14 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style15 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style15 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style16 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style16 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style17 {
      vertical-align: bottom;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      background-color: white
    }

    th.style17 {
      vertical-align: bottom;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      background-color: white
    }

    td.style18 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style18 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style19 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    th.style19 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    td.style20 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      background-color: white
    }

    th.style20 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      background-color: white
    }

    td.style21 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      background-color: white
    }

    th.style21 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      background-color: white
    }

    td.style22 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style22 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style23 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #333F4F;
      background-color: white
    }

    th.style23 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #333F4F;
      background-color: white
    }

    td.style24 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    th.style24 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    td.style25 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style25 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style26 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    th.style26 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    td.style27 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #FFFFFF;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: #6C016C
    }

    th.style27 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #FFFFFF;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: #6C016C
    }

    td.style28 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    th.style28 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    td.style29 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      text-decoration: none;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    th.style29 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      text-decoration: none;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    td.style30 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    th.style30 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    td.style31 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    th.style31 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    td.style32 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    th.style32 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    td.style33 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    th.style33 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    td.style34 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    th.style34 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 10pt;
      background-color: white
    }

    td.style35 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #999999 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    th.style35 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #999999 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    td.style36 {
      vertical-align: middle;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    th.style36 {
      vertical-align: middle;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    td.style37 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    th.style37 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: white
    }

    td.style38 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 12pt;
      background-color: white
    }

    th.style38 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 12pt;
      background-color: white
    }

    td.style39 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    th.style39 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    td.style40 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style40 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style41 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    th.style41 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    td.style42 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style42 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style43 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    th.style43 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #333F4F;
      background-color: white
    }

    td.style44 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style44 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style45 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style45 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style46 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #FFFFFF;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: #6C016C
    }

    th.style46 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #FFFFFF;
      font-family: 'Poppins';
      font-size: 9pt;
      background-color: #6C016C
    }

    td.style47 {
      vertical-align: middle;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #ffffff;
      background-color: #6C016C
    }

    th.style47 {
      vertical-align: bottom;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: #6C016C
    }

    td.style48 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style48 {
      vertical-align: middle;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style49 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: none #000000;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style49 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: none #000000;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style50 {
      vertical-align: bottom;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style50 {
      vertical-align: bottom;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style51 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style51 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style52 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style52 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style53 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style53 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style54 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style54 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style55 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: none #000000;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style55 {
      vertical-align: middle;
      text-align: left;
      padding-left: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: 1px solid #BFBFBF !important;
      border-right: none #000000;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style56 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style56 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style57 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style57 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style58 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style58 {
      vertical-align: middle;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style59 {
      vertical-align: bottom;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    th.style59 {
      vertical-align: bottom;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #1F3864;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    td.style60 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #434343;
      background-color: #FFFFFF
    }

    th.style60 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #434343;
      background-color: #FFFFFF
    }

    td.style61 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: none #000000;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style61 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: 1px solid #BFBFBF !important;
      border-right: none #000000;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style62 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    th.style62 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #BFBFBF !important;
      border-top: 1px solid #BFBFBF !important;
      border-left: none #000000;
      border-right: 1px solid #BFBFBF !important;
      color: #FFFFFF;
      background-color: #FFFFFF
    }

    td.style63 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    th.style63 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: white
    }

    td.style64 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: #170c66
    }

    th.style64 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: #170c66
    }

    td.style65 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: #170c66
    }

    th.style65 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      background-color: #170c66
    }

    td.style66 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    th.style66 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 11pt;
      background-color: white
    }

    td.style67 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 13pt;
      background-color: white
    }

    th.style67 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #333F4F;
      font-family: 'Poppins';
      font-size: 13pt;
      background-color: white
    }

    table.sheet0 col.col0 {
      width: 90.14444341pt
    }

    table.sheet0 col.col1 {
      width: 184.35555344pt
    }

    table.sheet0 col.col2 {
      width: 35.24444404pt
    }

    table.sheet0 col.col3 {
      width: 77.94444355pt
    }

    table.sheet0 col.col4 {
      width: 71.84444362pt
    }

    table.sheet0 col.col5 {
      width: 73.87777693pt
    }

    table.sheet0 col.col6 {
      width: 90.14444341pt
    }

    table.sheet0 tr {
      height: 15pt
    }

    table.sheet0 tr.row0 {
      height: 14.25pt
    }

    table.sheet0 tr.row1 {
      height: 14.25pt
    }

    table.sheet0 tr.row2 {
      height: 14.25pt
    }

    table.sheet0 tr.row3 {
      height: 63pt
    }

    table.sheet0 tr.row4 {
      height: 18pt
    }

    table.sheet0 tr.row5 {
      height: 18pt
    }

    table.sheet0 tr.row6 {
      height: 18pt
    }

    table.sheet0 tr.row7 {
      height: 18pt
    }

    table.sheet0 tr.row8 {
      height: 18pt
    }

    table.sheet0 tr.row9 {
      height: 18pt
    }

    table.sheet0 tr.row10 {
      height: 1.8pt
    }

    table.sheet0 tr.row11 {
      height: 18pt
    }

    table.sheet0 tr.row12 {
      height: 18pt
    }

    table.sheet0 tr.row13 {
      height: 18pt
    }

    table.sheet0 tr.row14 {
      height: 18pt
    }

    table.sheet0 tr.row15 {
      height: 18pt
    }

    table.sheet0 tr.row16 {
      height: 18pt
    }

    table.sheet0 tr.row17 {
      height: 18pt
    }

    table.sheet0 tr.row18 {
      height: 18pt
    }

    table.sheet0 tr.row19 {
      height: 18pt
    }

    table.sheet0 tr.row20 {
      height: 18pt
    }

    table.sheet0 tr.row21 {
      height: 18pt
    }

    table.sheet0 tr.row22 {
      height: 18pt
    }

    table.sheet0 tr.row23 {
      height: 18pt
    }

    table.sheet0 tr.row24 {
      height: 18pt
    }

    table.sheet0 tr.row25 {
      height: 18pt
    }

    table.sheet0 tr.row26 {
      height: 18pt
    }

    table.sheet0 tr.row27 {
      height: 18pt
    }

    table.sheet0 tr.row28 {
      height: 18pt
    }

    table.sheet0 tr.row29 {
      height: 18pt
    }

    table.sheet0 tr.row30 {
      height: 19.5pt
    }

    table.sheet0 tr.row31 {
      height: 19.5pt
    }

    table.sheet0 tr.row32 {
      height: 21.75pt
    }

    table.sheet0 tr.row33 {
      height: 33.75pt
    }

    table.sheet0 tr.row34 {
      height: 9.75pt
    }

    table.sheet0 tr.row35 {
      height: 9.75pt
    }

    table.sheet0 tr.row36 {
      height: 15.75pt
    }

    table.sheet0 tr.row37 {
      height: 15.75pt
    }

    table.sheet0 tr.row38 {
      height: 21pt
    }

    table.sheet0 tr.row39 {
      height: 15.75pt
    }

    table.sheet0 tr.row40 {
      height: 15.75pt
    }
  </style>
</head>

<body>
  <style>
    @page {
      margin-left: 0in;
      margin-right: 0in;
      margin-top: 0in;
      margin-bottom: 0in;
    }

    body {
      margin-left: 0in;
      margin-right: 0in;
      margin-top: 0in;
      margin-bottom: 0in;
    }
  </style>
  <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0">
    <col class="col0">
    <col class="col1">
    <col class="col2">
    <col class="col3">
    <col class="col4">
    <col class="col5">
    <col class="col6">
    <tbody>
      <tr class="row0">
        <td class="column0 style65 null"></td>
        <td class="column1 style65 null"></td>
        <td class="column2 style65 null"></td>
        <td class="column3 style65 null"></td>
        <td class="column4 style65 null"></td>
        <td class="column5 style65 null"></td>
        <td class="column6 style65 null"></td>
      </tr>
      <tr class="row1">
        <td class="column0 style1 null"></td>
        <td class="column1 style2 null"></td>
        <td class="column2 style1 null"></td>
        <td class="column3 style1 null"></td>
        <td class="column4 style1 null"></td>
        <td class="column5 style1 null"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row2">
        <td class="column0 style3 null"></td>
        <td class="column1 style4 null"></td>
        <td class="column2 style1 null"></td>
        <td class="column3 style3 null"></td>
        <td class="column4 style3 null"></td>
        <td class="column5 style3 null"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row3">
        <td class="column0 style3 null"></td>
        <td class="column1 style67 s">Valdusoft</td>
        <td class="column2 style2 null"></td>
        <td class="column3 style1 null"></td>
        <td class="column4 style1 null"></td>
        <td class="column5 style5 null">
          <div style="position: relative;"><img style="position: relative; z-index: 1; left: 0px; top: 3px; bottom: 100px; width: 109px; height: auto;" src="https://lh3.googleusercontent.com/-sIenNNGPBf8/YKRe2vVtxTI/AAAAAAAAk58/LhOPfuSaI5I32Hm8U76vQzHRnES7nT5bgCK8BGAsYHg/s0/2021-05-18.png?authuser=0" border="0" /></div>
        </td>
        <td class="column6 style2 null"></td>
      </tr>
      <tr class="row4">
        <td class="column0 style3 null"></td>
        <td class="column1 style28 s">San Cristobal - Tachira</td>
        <td class="column2 style1 null"></td>
        <td class="column3 style6 null"></td>
        <td class="column4 style1 null"></td>
        <td class="column5 style32 s">27.04.2021</td>+
        <td class="column6 style7 null"></td>
      </tr>
      <tr class="row5">
        <td class="column0 style3 null"></td>
        <td class="column1 style29 s"><a href="https://valdusoft.com/" title="">Valdusoft.com</a></td>
        <td class="column2 style1 null"></td>
        <td class="column3 style6 null"></td>
        <td class="column4 style1 null"></td>
        <td class="column5 style33 s">Nº de factura</td>
        <td class="column6 style7 null"></td>
      </tr>
      <tr class="row6">
        <td class="column0 style3 null"></td>
        <td class="column1 style28 s">financiero@valdusoft.com</td>
        <td class="column2 style1 null"></td>
        <td class="column3 style1 null"></td>
        <td class="column4 style1 null"></td>
        <td class="column5 style34 s">138</td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row7">
        <td class="column0 style3 null"></td>
        <td class="column1 style66 s">Alexis Valera</td>
        <td class="column2 style1 null"></td>
        <td class="column3 style1 null"></td>
        <td class="column4 style48 null style40" colspan="2"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row8">
        <td class="column0 style3 null"></td>
        <td class="column1 style2 null"></td>
        <td class="column2 style48 null style40" colspan="4"></td>
        <td class="column6 style8 null"></td>
      </tr>
      <tr class="row9">
        <td class="column0 style3 null"></td>
        <td class="column1 style59 s">Cliente</td>
        <td class="column2 style2 null"></td>
        <td class="column3 style2 null"></td>
        <td class="column4 style2 null"></td>
        <td class="column5 style2 null"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row10">
        <td class="column0 style3 null"></td>
        <td class="column1 style30 null"></td>
        <td class="column2 style1 null"></td>
        <td class="column3 style2 null"></td>
        <td class="column4 style1 null"></td>
        <td class="column5 style1 null"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row11">
        <td class="column0 style3 null"></td>
        <td class="column1 style31 s">Union capital</td>
        <td class="column2 style1 null"></td>
        <td class="column3 style44 null style40" colspan="3"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row12">
        <td class="column0 style3 null"></td>
        <td class="column1 style9 s">&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="column2 style1 null"></td>
        <td class="column3 style44 null style40" colspan="3"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row13">
        <td class="column0 style3 null"></td>
        <td class="column1 style9 null"></td>
        <td class="column2 style1 null"></td>
        <td class="column3 style44 null style40" colspan="3"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row14">
        <td class="column0 style3 null"></td>
        <td class="column1 style10 null"></td>
        <td class="column2 style1 null"></td>
        <td class="column3 style2 null"></td>
        <td class="column4 style2 null"></td>
        <td class="column5 style2 null"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row15">
        <td class="column0 style3 null"></td>
        <td class="column1 style1 null"></td>
        <td class="column2 style1 null"></td>
        <td class="column3 style45 null style40" colspan="3"></td>
        <td class="column6 style1 null"></td>
      </tr>
      <tr class="row16">
        <td class="column0 style11 null"></td>
        <td class="column1 style46 s style47" colspan="2">Descripción</td>
        <td class="column3 style27 s">Unidades</td>
        <td class="column4 style27 s">Precio Unitario</td>
        <td class="column5 style27 s">Precio</td>
        <td class="column6 style12 null"></td>
      </tr>
      <tr class="row17">
        <td class="column0 style11 null"></td>
        <td class="column1 style49 null style50" colspan="2"></td>
        <td class="column3 style51 null"></td>
        <td class="column4 style52 null"></td>
        <td class="column5 style52 null"></td>
        <td class="column6 style13 null"></td>
      </tr>
      <tr class="row18">
        <td class="column0 style11 null"></td>
        <td class="column1 style49 null style50" colspan="2"></td>
        <td class="column3 style53 null"></td>
        <td class="column4 style54 null"></td>
        <td class="column5 style54 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row19">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row20">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row21">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row22">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row23">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row24">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row25">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row26">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row27">
        <td class="column0 style11 null"></td>
        <td class="column1 style61 null style62" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style57 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row28">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style58 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row29">
        <td class="column0 style11 null"></td>
        <td class="column1 style55 null style50" colspan="2"></td>
        <td class="column3 style56 null"></td>
        <td class="column4 style57 null"></td>
        <td class="column5 style58 null"></td>
        <td class="column6 style14 null"></td>
      </tr>
      <tr class="row30">
        <td class="column0 style11 null"></td>
        <td class="column1 style15 null"></td>
        <td class="column2 style16 null"></td>
        <td class="column3 style17 null"></td>
        <td class="column4 style35 s">Total parcial</td>
        <td class="column5 style36 f">0.00</td>
        <td class="column6 style18 null"></td>
      </tr>
      <tr class="row31">
        <td class="column0 style11 null"></td>
        <td class="column1 style42 null style40" colspan="2"></td>
        <td class="column3 style17 null"></td>
        <td class="column4 style37 s">Descuento</td>
        <td class="column5 style36 n">0.00</td>
        <td class="column6 style18 null"></td>
      </tr>
      <tr class="row32">
        <td class="column0 style11 null"></td>
        <td class="column1 style19 null"></td>
        <td class="column2 style19 null"></td>
        <td class="column3 style17 null"></td>
        <td class="column4 style63 null style63" colspan="2"></td>
        <td class="column6 style20 null"></td>
      </tr>
      <tr class="row33">
        <td class="column0 style11 null"></td>
        <td class="column1 style43 null style40" colspan="2"></td>
        <td class="column3 style17 null"></td>
        <td class="column4 style38 s">Pagado</td>
        <td class="column5 style36 f">0.00</td>
        <td class="column6 style20 null"></td>
      </tr>
      <tr class="row34">
        <td class="column0 style11 null"></td>
        <td class="column1 style21 null"></td>
        <td class="column2 style22 null"></td>
        <td class="column3 style22 null"></td>
        <td class="column4 style22 null"></td>
        <td class="column5 style22 null"></td>
        <td class="column6 style22 null"></td>
      </tr>
      <tr class="row35">
        <td class="column0 style11 null"></td>
        <td class="column1 style21 null"></td>
        <td class="column2 style22 null"></td>
        <td class="column3 style22 null"></td>
        <td class="column4 style22 null"></td>
        <td class="column5 style22 null"></td>
        <td class="column6 style22 null"></td>
      </tr>
      <tr class="row36">+
        <td class="column0 style11 null"></td>
        <td class="column1 style21 null"></td>
        <td class="column2 style23 null"></td>
        <td class="column3 style23 null"></td>
        <td class="column4 style23 null"></td>
        <td class="column5 style60 null"></td>
        <td class="column6 style23 null"></td>
      </tr>
      <tr class="row37">
        <td class="column0 style11 null"></td>
        <td class="column1 style39 null style40" colspan="5"></td>
        <td class="column6 style24 null"></td>
      </tr>
      <tr class="row38">
        <td class="column0 style25 null"></td>
        <td class="column1 style41 null style40" colspan="5"></td>
        <td class="column6 style26 null"></td>
      </tr>
      <tr class="row39">
        <td class="column0 style11 null"></td>
        <td class="column1 style11 null"></td>
        <td class="column2 style11 null"></td>
        <td class="column3 style11 null"></td>
        <td class="column4 style11 null"></td>
        <td class="column5 style11 null"></td>
        <td class="column6 style11 null"></td>
      </tr>
      <tr class="row40">
        <td class="column0 style64 null"></td>
        <td class="column1 style64 null"></td>
        <td class="column2 style64 null"></td>
        <td class="column3 style64 null"></td>
        <td class="column4 style64 null"></td>
        <td class="column5 style64 null"></td>
        <td class="column6 style64 null"></td>
      </tr>
    </tbody>
  </table>
</body>

</html>