<?php
?>
<script language="JavaScript">

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);


function MM_timelinePlay(tmLnName, myID) { //v1.2
  //Copyright 1997 Macromedia, Inc. All rights reserved.
  var i,j,tmLn,props,keyFrm,sprite,numKeyFr,firstKeyFr,propNum,theObj,firstTime=false;
  if (document.MM_Time == null) MM_initTimelines(); //if *very* 1st time
  tmLn = document.MM_Time[tmLnName];
  if (myID == null) { myID = ++tmLn.ID; firstTime=true;}//if new call, incr ID
  if (myID == tmLn.ID) { //if Im newest
    setTimeout('MM_timelinePlay("'+tmLnName+'",'+myID+')',tmLn.delay);
    fNew = ++tmLn.curFrame;
    for (i=0; i<tmLn.length; i++) {
      sprite = tmLn[i];
      if (sprite.charAt(0) == 's') {
        if (sprite.obj) {
          numKeyFr = sprite.keyFrames.length; firstKeyFr = sprite.keyFrames[0];
          if (fNew >= firstKeyFr && fNew <= sprite.keyFrames[numKeyFr-1]) {//in range
            keyFrm=1;
            for (j=0; j<sprite.values.length; j++) {
              props = sprite.values[j]; 
              if (numKeyFr != props.length) {
                if (props.prop2 == null) sprite.obj[props.prop] = props[fNew-firstKeyFr];
                else        sprite.obj[props.prop2][props.prop] = props[fNew-firstKeyFr];
              } else {
                while (keyFrm<numKeyFr && fNew>=sprite.keyFrames[keyFrm]) keyFrm++;
                if (firstTime || fNew==sprite.keyFrames[keyFrm-1]) {
                  if (props.prop2 == null) sprite.obj[props.prop] = props[keyFrm-1];
                  else        sprite.obj[props.prop2][props.prop] = props[keyFrm-1];
        } } } } }
      } else if (sprite.charAt(0)=='b' && fNew == sprite.frame) eval(sprite.value);
      if (fNew > tmLn.lastFrame) tmLn.ID = 0;
  } }
}

function MM_timelineGoto(tmLnName, fNew, numGotos) { //v2.0
  //Copyright 1997 Macromedia, Inc. All rights reserved.
  var i,j,tmLn,props,keyFrm,sprite,numKeyFr,firstKeyFr,lastKeyFr,propNum,theObj;
  if (document.MM_Time == null) MM_initTimelines(); //if *very* 1st time
  tmLn = document.MM_Time[tmLnName];
  if (numGotos != null)
    if (tmLn.gotoCount == null) tmLn.gotoCount = 1;
    else if (tmLn.gotoCount++ >= numGotos) {tmLn.gotoCount=0; return}
  jmpFwd = (fNew > tmLn.curFrame);
  for (i = 0; i < tmLn.length; i++) {
    sprite = (jmpFwd)? tmLn[i] : tmLn[(tmLn.length-1)-i]; //count bkwds if jumping back
    if (sprite.charAt(0) == "s") {
      numKeyFr = sprite.keyFrames.length;
      firstKeyFr = sprite.keyFrames[0];
      lastKeyFr = sprite.keyFrames[numKeyFr - 1];
      if ((jmpFwd && fNew<firstKeyFr) || (!jmpFwd && lastKeyFr<fNew)) continue; //skip if untouchd
      for (keyFrm=1; keyFrm<numKeyFr && fNew>=sprite.keyFrames[keyFrm]; keyFrm++);
      for (j=0; j<sprite.values.length; j++) {
        props = sprite.values[j];
        if (numKeyFr == props.length) propNum = keyFrm-1 //keyframes only
        else propNum = Math.min(Math.max(0,fNew-firstKeyFr),props.length-1); //or keep in legal range
        if (sprite.obj != null) {
          if (props.prop2 == null) sprite.obj[props.prop] = props[propNum];
          else        sprite.obj[props.prop2][props.prop] = props[propNum];
      } }
    } else if (sprite.charAt(0)=='b' && fNew == sprite.frame) eval(sprite.value);
  }
  tmLn.curFrame = fNew;
  if (tmLn.ID == 0) eval('MM_timelinePlay(tmLnName)');
}

function MM_initTimelines() { //v4.0
    //MM_initTimelines() Copyright 1997 Macromedia, Inc. All rights reserved.
    var ns = navigator.appName == "Netscape";
    var ns4 = (ns && parseInt(navigator.appVersion) == 4);
    var ns5 = (ns && parseInt(navigator.appVersion) > 4);
    document.MM_Time = new Array(1);
    document.MM_Time[0] = new Array(2);
    document.MM_Time["Timeline1"] = document.MM_Time[0];
    document.MM_Time[0].MM_Name = "Timeline1";
    document.MM_Time[0].fps = 15;
    document.MM_Time[0][0] = new String("sprite");
    document.MM_Time[0][0].slot = 1;
    if (ns4)
        document.MM_Time[0][0].obj = document["Layer1"];
    else if (ns5)
        document.MM_Time[0][0].obj = document.getElementById("Layer1");
    else
        document.MM_Time[0][0].obj = document.all ? document.all["Layer1"] : null;
    document.MM_Time[0][0].keyFrames = new Array(1, 171, 218, 325, 424, 518);
    document.MM_Time[0][0].values = new Array(2);
    if (ns5)
        document.MM_Time[0][0].values[0] = new Array("20px", "24px", "28px", "32px", "37px", "41px", "45px", "49px", "53px", "57px", "61px", "65px", "69px", "73px", "78px", "82px", "86px", "90px", "94px", "98px", "102px", "106px", "110px", "114px", "118px", "122px", "126px", "130px", "134px", "138px", "142px", "146px", "150px", "154px", "159px", "163px", "167px", "171px", "175px", "179px", "183px", "187px", "191px", "195px", "199px", "203px", "207px", "211px", "215px", "219px", "223px", "227px", "231px", "235px", "239px", "244px", "248px", "252px", "256px", "260px", "264px", "268px", "272px", "276px", "280px", "284px", "288px", "292px", "296px", "300px", "304px", "309px", "313px", "317px", "321px", "325px", "329px", "333px", "337px", "341px", "345px", "349px", "353px", "358px", "362px", "366px", "370px", "374px", "378px", "382px", "386px", "390px", "394px", "398px", "402px", "406px", "410px", "414px", "418px", "422px", "425px", "429px", "433px", "437px", "441px", "445px", "449px", "453px", "456px", "460px", "464px", "468px", "472px", "476px", "479px", "483px", "487px", "491px", "494px", "498px", "502px", "506px", "509px", "513px", "517px", "521px", "524px", "528px", "532px", "535px", "539px", "543px", "546px", "550px", "554px", "557px", "561px", "565px", "568px", "572px", "576px", "579px", "583px", "587px", "590px", "594px", "597px", "601px", "605px", "608px", "612px", "615px", "619px", "623px", "626px", "630px", "633px", "637px", "641px", "644px", "648px", "651px", "655px", "659px", "662px", "666px", "669px", "673px", "677px", "680px", "684px", "694px", "704px", "714px", "723px", "732px", "741px", "749px", "756px", "764px", "771px", "777px", "783px", "789px", "795px", "800px", "805px", "810px", "815px", "819px", "823px", "827px", "830px", "834px", "837px", "841px", "844px", "847px", "850px", "853px", "856px", "858px", "861px", "863px", "865px", "867px", "869px", "870px", "871px", "872px", "872px", "871px", "869px", "866px", "861px", "855px", "846px", "836px", "830px", "824px", "818px", "811px", "805px", "799px", "793px", "787px", "780px", "774px", "768px", "762px", "755px", "749px", "743px", "736px", "730px", "724px", "717px", "711px", "704px", "698px", "691px", "685px", "678px", "671px", "665px", "658px", "651px", "645px", "638px", "631px", "624px", "617px", "611px", "604px", "597px", "590px", "583px", "576px", "569px", "561px", "554px", "547px", "540px", "533px", "525px", "518px", "511px", "503px", "496px", "488px", "481px", "473px", "466px", "458px", "451px", "443px", "436px", "429px", "421px", "414px", "407px", "399px", "392px", "385px", "378px", "370px", "363px", "356px", "349px", "342px", "335px", "328px", "321px", "314px", "307px", "300px", "294px", "287px", "280px", "273px", "266px", "260px", "253px", "246px", "240px", "233px", "226px", "220px", "213px", "207px", "200px", "194px", "187px", "181px", "174px", "168px", "161px", "155px", "149px", "142px", "136px", "129px", "123px", "116px", "110px", "105px", "104px", "107px", "111px", "115px", "120px", "124px", "128px", "133px", "137px", "141px", "146px", "150px", "155px", "159px", "163px", "168px", "172px", "176px", "181px", "185px", "189px", "193px", "198px", "202px", "206px", "210px", "214px", "218px", "222px", "226px", "230px", "234px", "238px", "242px", "246px", "250px", "254px", "258px", "262px", "266px", "269px", "273px", "277px", "281px", "284px", "288px", "292px", "295px", "299px", "303px", "306px", "310px", "314px", "317px", "321px", "325px", "328px", "332px", "336px", "339px", "343px", "346px", "350px", "354px", "357px", "361px", "364px", "368px", "372px", "375px", "379px", "382px", "386px", "389px", "393px", "396px", "400px", "403px", "406px", "410px", "413px", "417px", "420px", "423px", "426px", "430px", "433px", "436px", "439px", "442px", "445px", "448px", "450px", "453px", "455px", "457px", "458px", "458px", "456px", "453px", "450px", "446px", "441px", "437px", "433px", "428px", "424px", "419px", "415px", "410px", "405px", "401px", "396px", "392px", "387px", "382px", "378px", "373px", "368px", "364px", "359px", "355px", "350px", "345px", "341px", "336px", "332px", "327px", "322px", "318px", "313px", "309px", "304px", "299px", "295px", "290px", "286px", "281px", "276px", "272px", "267px", "263px", "258px", "254px", "249px", "245px", "240px", "235px", "231px", "226px", "222px", "217px", "213px", "208px", "204px", "199px", "194px", "190px", "185px", "181px", "176px", "172px", "167px", "163px", "158px", "153px", "149px", "144px", "140px", "135px", "131px", "126px", "122px", "117px", "112px", "108px", "103px", "99px", "94px", "90px", "85px", "81px", "76px", "71px", "67px", "62px", "58px", "53px", "49px", "44px", "40px", "35px");
    else
        document.MM_Time[0][0].values[0] = new Array(20,24,28,32,37,41,45,49,53,57,61,65,69,73,78,82,86,90,94,98,102,106,110,114,118,122,126,130,134,138,142,146,150,154,159,163,167,171,175,179,183,187,191,195,199,203,207,211,215,219,223,227,231,235,239,244,248,252,256,260,264,268,272,276,280,284,288,292,296,300,304,309,313,317,321,325,329,333,337,341,345,349,353,358,362,366,370,374,378,382,386,390,394,398,402,406,410,414,418,422,425,429,433,437,441,445,449,453,456,460,464,468,472,476,479,483,487,491,494,498,502,506,509,513,517,521,524,528,532,535,539,543,546,550,554,557,561,565,568,572,576,579,583,587,590,594,597,601,605,608,612,615,619,623,626,630,633,637,641,644,648,651,655,659,662,666,669,673,677,680,684,694,704,714,723,732,741,749,756,764,771,777,783,789,795,800,805,810,815,819,823,827,830,834,837,841,844,847,850,853,856,858,861,863,865,867,869,870,871,872,872,871,869,866,861,855,846,836,830,824,818,811,805,799,793,787,780,774,768,762,755,749,743,736,730,724,717,711,704,698,691,685,678,671,665,658,651,645,638,631,624,617,611,604,597,590,583,576,569,561,554,547,540,533,525,518,511,503,496,488,481,473,466,458,451,443,436,429,421,414,407,399,392,385,378,370,363,356,349,342,335,328,321,314,307,300,294,287,280,273,266,260,253,246,240,233,226,220,213,207,200,194,187,181,174,168,161,155,149,142,136,129,123,116,110,105,104,107,111,115,120,124,128,133,137,141,146,150,155,159,163,168,172,176,181,185,189,193,198,202,206,210,214,218,222,226,230,234,238,242,246,250,254,258,262,266,269,273,277,281,284,288,292,295,299,303,306,310,314,317,321,325,328,332,336,339,343,346,350,354,357,361,364,368,372,375,379,382,386,389,393,396,400,403,406,410,413,417,420,423,426,430,433,436,439,442,445,448,450,453,455,457,458,458,456,453,450,446,441,437,433,428,424,419,415,410,405,401,396,392,387,382,378,373,368,364,359,355,350,345,341,336,332,327,322,318,313,309,304,299,295,290,286,281,276,272,267,263,258,254,249,245,240,235,231,226,222,217,213,208,204,199,194,190,185,181,176,172,167,163,158,153,149,144,140,135,131,126,122,117,112,108,103,99,94,90,85,81,76,71,67,62,58,53,49,44,40,35);
    document.MM_Time[0][0].values[0].prop = "left";
    if (ns5)
        document.MM_Time[0][0].values[1] = new Array("122px", "124px", "127px", "129px", "132px", "134px", "137px", "139px", "142px", "145px", "147px", "150px", "152px", "155px", "158px", "160px", "163px", "165px", "168px", "171px", "173px", "176px", "179px", "181px", "184px", "187px", "189px", "192px", "194px", "197px", "200px", "202px", "205px", "208px", "210px", "213px", "216px", "218px", "221px", "224px", "226px", "229px", "232px", "234px", "237px", "240px", "242px", "245px", "247px", "250px", "253px", "255px", "258px", "261px", "263px", "266px", "269px", "271px", "274px", "276px", "279px", "282px", "284px", "287px", "290px", "292px", "295px", "297px", "300px", "303px", "305px", "308px", "310px", "313px", "316px", "318px", "321px", "323px", "326px", "329px", "331px", "334px", "336px", "339px", "341px", "344px", "346px", "349px", "351px", "354px", "356px", "359px", "361px", "364px", "366px", "368px", "371px", "373px", "376px", "378px", "380px", "383px", "385px", "387px", "389px", "392px", "394px", "396px", "399px", "401px", "403px", "405px", "407px", "410px", "412px", "414px", "416px", "418px", "420px", "422px", "424px", "426px", "429px", "431px", "433px", "435px", "437px", "439px", "441px", "442px", "444px", "446px", "448px", "450px", "452px", "454px", "456px", "457px", "459px", "461px", "463px", "464px", "466px", "468px", "470px", "471px", "473px", "474px", "476px", "478px", "479px", "481px", "482px", "483px", "485px", "486px", "488px", "489px", "490px", "491px", "493px", "494px", "495px", "496px", "497px", "498px", "498px", "499px", "500px", "500px", "501px", "502px", "501px", "500px", "497px", "494px", "490px", "486px", "481px", "476px", "471px", "466px", "460px", "454px", "448px", "442px", "436px", "430px", "424px", "418px", "411px", "405px", "399px", "393px", "387px", "381px", "374px", "368px", "361px", "354px", "347px", "340px", "332px", "325px", "317px", "309px", "300px", "292px", "283px", "274px", "265px", "256px", "247px", "238px", "230px", "223px", "218px", "216px", "216px", "216px", "217px", "217px", "218px", "220px", "221px", "222px", "223px", "225px", "227px", "228px", "230px", "232px", "233px", "235px", "237px", "239px", "241px", "243px", "245px", "247px", "249px", "251px", "254px", "256px", "258px", "260px", "262px", "265px", "267px", "269px", "272px", "274px", "276px", "279px", "281px", "284px", "286px", "289px", "291px", "294px", "297px", "299px", "302px", "304px", "307px", "310px", "312px", "315px", "318px", "321px", "323px", "326px", "329px", "332px", "334px", "337px", "340px", "343px", "345px", "348px", "351px", "354px", "356px", "359px", "362px", "364px", "367px", "369px", "372px", "375px", "377px", "380px", "382px", "385px", "387px", "390px", "392px", "395px", "397px", "400px", "402px", "404px", "407px", "409px", "411px", "414px", "416px", "418px", "420px", "422px", "425px", "427px", "429px", "431px", "433px", "435px", "436px", "438px", "440px", "442px", "443px", "444px", "445px", "446px", "446px", "444px", "438px", "434px", "429px", "425px", "422px", "418px", "415px", "411px", "408px", "405px", "401px", "398px", "395px", "392px", "389px", "386px", "383px", "380px", "377px", "375px", "372px", "369px", "366px", "363px", "361px", "358px", "355px", "353px", "350px", "347px", "345px", "342px", "340px", "337px", "334px", "332px", "329px", "327px", "324px", "322px", "319px", "317px", "315px", "312px", "310px", "307px", "305px", "303px", "300px", "298px", "295px", "293px", "290px", "288px", "286px", "283px", "281px", "278px", "276px", "273px", "271px", "268px", "266px", "263px", "261px", "259px", "256px", "254px", "251px", "248px", "246px", "243px", "241px", "238px", "236px", "233px", "230px", "228px", "225px", "223px", "220px", "217px", "214px", "212px", "209px", "206px", "203px", "200px", "197px", "194px", "191px", "188px", "184px", "181px", "177px", "173px", "169px", "165px", "161px", "157px", "154px", "152px", "149px", "148px", "146px", "144px", "143px", "142px", "141px", "140px", "139px", "138px", "137px", "137px", "136px", "136px", "135px", "134px", "134px", "133px", "133px", "133px", "132px", "132px", "132px", "131px", "131px", "131px", "130px", "130px", "130px", "130px", "130px", "129px", "129px", "129px", "129px", "129px", "129px", "129px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "128px", "127px", "127px");
    else
        document.MM_Time[0][0].values[1] = new Array(122,124,127,129,132,134,137,139,142,145,147,150,152,155,158,160,163,165,168,171,173,176,179,181,184,187,189,192,194,197,200,202,205,208,210,213,216,218,221,224,226,229,232,234,237,240,242,245,247,250,253,255,258,261,263,266,269,271,274,276,279,282,284,287,290,292,295,297,300,303,305,308,310,313,316,318,321,323,326,329,331,334,336,339,341,344,346,349,351,354,356,359,361,364,366,368,371,373,376,378,380,383,385,387,389,392,394,396,399,401,403,405,407,410,412,414,416,418,420,422,424,426,429,431,433,435,437,439,441,442,444,446,448,450,452,454,456,457,459,461,463,464,466,468,470,471,473,474,476,478,479,481,482,483,485,486,488,489,490,491,493,494,495,496,497,498,498,499,500,500,501,502,501,500,497,494,490,486,481,476,471,466,460,454,448,442,436,430,424,418,411,405,399,393,387,381,374,368,361,354,347,340,332,325,317,309,300,292,283,274,265,256,247,238,230,223,218,216,216,216,217,217,218,220,221,222,223,225,227,228,230,232,233,235,237,239,241,243,245,247,249,251,254,256,258,260,262,265,267,269,272,274,276,279,281,284,286,289,291,294,297,299,302,304,307,310,312,315,318,321,323,326,329,332,334,337,340,343,345,348,351,354,356,359,362,364,367,369,372,375,377,380,382,385,387,390,392,395,397,400,402,404,407,409,411,414,416,418,420,422,425,427,429,431,433,435,436,438,440,442,443,444,445,446,446,444,438,434,429,425,422,418,415,411,408,405,401,398,395,392,389,386,383,380,377,375,372,369,366,363,361,358,355,353,350,347,345,342,340,337,334,332,329,327,324,322,319,317,315,312,310,307,305,303,300,298,295,293,290,288,286,283,281,278,276,273,271,268,266,263,261,259,256,254,251,248,246,243,241,238,236,233,230,228,225,223,220,217,214,212,209,206,203,200,197,194,191,188,184,181,177,173,169,165,161,157,154,152,149,148,146,144,143,142,141,140,139,138,137,137,136,136,135,134,134,133,133,133,132,132,132,131,131,131,130,130,130,130,130,129,129,129,129,129,129,129,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,128,127,127);
    document.MM_Time[0][0].values[1].prop = "top";
    if (!ns4) {
        document.MM_Time[0][0].values[0].prop2 = "style";
        document.MM_Time[0][0].values[1].prop2 = "style";
    }
    document.MM_Time[0][1] = new String("behavior");
    document.MM_Time[0][1].frame = 520;
    document.MM_Time[0][1].value = "MM_timelineGoto('Timeline1','1')";
    document.MM_Time[0].lastFrame = 520;
    for (i=0; i<document.MM_Time.length; i++) {
        document.MM_Time[i].ID = null;
        document.MM_Time[i].curFrame = 0;
        document.MM_Time[i].delay = 1000/document.MM_Time[i].fps;
    }
}

</script>
<div id="Layer1" style="position:absolute; left:20px; top:122px; width:150px; height:150px; z-index:1"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="150" height="150">
    <param name=movie value="sm_tm.swf">
    <param name=quality value=high>
    <PARAM NAME=wmode VALUE=transparent>
    <embed src="sm_tm.swf" quality=high wmode=transparent pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="150" height="150">
    </embed> 
  </object></div>
<script>MM_timelinePlay('Timeline1');</script>
<?php
?>
