@extends('welcome')
@section('guestContent')



<!-- This is in the display period of the BOOKS page -->

<h4 class="gridContainerTitle my-4">The Best Books Of All Time</h4>
<div class="sliderContainer">

  <div class="detailContainer mySlides">
    <div class="insideDetailTextContainer row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
      <div class="imageContainer" style="width: 30%;">
        <img src="{{asset('images/akt_hateu12.jpg')}}" alt="image" width=" 352px" height="485px">
      </div>
      <div style="width: 60%;" class="detailTextContainer">
        <h5 class="detailText author">အကြည်တော်</h5>
        <h3 class="detailText status">ရှင့်ကိုမုန်းတာ ၁၂ ခါ</h3>
        <h5 class="detailText category">ရသစာပေစာအုပ်</h5>
        <p class="detailText desciption">'ရှင့်ကိုမုန်းတာ ဆယ့်နှစ်ခါ' တဲ့။ ဒီစကားက သူ့နားထဲ အရင်က အမြဲကြားနေရတဲ့ စကားလေးပေါ့။ အခုတော့ အဲဒီစကားကို ခဏခဏ ပြောခဲ့ဖူးတဲ့ ကောင်မလေးလည်း အိမ်ထောင်ကျလို့ ကလေးတွေဘာတွေတောင် ရနေလောက်ပြီ။ ဒါပေမဲ့ ဆရာကြည်က အမှတ်ရနေမိသေးဟန် တူပါရဲ့။ ဝတ္ထုလေးတစ်ပုဒ် ရေးပစ်လိုက်တယ်။ ဒီဝတ္ထုကိုသာ အဲဒီကောင်မလေး ဖတ်ဖြစ်ခဲ့ရင် 'ရှင့်ကိုမုန်းတာ ဆယ့်နှစ်ခါ' လို့များ ပြောဦးမလား မသိဘူးနော်။ လွမ်းစရာလေးတော့ ဖြစ်မှာပါ။ ဒါပေမဲ့ ကိုယ့်ဆရာတို့ မပူနဲ့ခင်ဗျ။ ရယ်စရာတွေလည်း အပြည့်ပါပဲ။ အနည်းဆုံး ဆယ့်နှစ်ခါလောက်တော့ ရယ်ရမှာ အသေအချာပါပဲခင်ဗျ။
        <div class="detailButton">
          <a href="{{asset('pdfs/7_1718352422' )}}" download><button type="button" class="btn btn-orange">Download <i class="fa-solid fa-circle-down"></i></button></a>
          <a href="{{asset('pdfs/7_1718352422' )}}" target="_blank"><button type="button" class="btn btn-orange">Read Online <i class="fa-solid fa-eye"></i></button></a>
        </div>
      </div>
    </div>
  </div>

  <div class="detailContainer mySlides">
    <div class="insideDetailTextContainer row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
      <div class="imageContainer" style="width: 30%;">
        <img src="{{asset('images/mtt_iwishtocontinue.jpg')}}" alt="image" width=" 352px" height="485px">
      </div>
      <div style="width: 70%;" class="detailTextContainer">
        <h5 class="detailText author">မြသန်းတင့်</h5>
        <h5 class="detailText status">ကျွန်တော်ဆက်၍ ရေးချင်သော ဝတ္ထုများ</h5>
        <h5 class="detailText category">သင်ခန်းစာ စာအုပ်</h5>
        <p class="detailText desciption">စာပေအနုပညာတစ်ရပ်ကို လူတန်းစားအမြင်နဲ့ ကြည့်ချင်တယ်ဆိုရင် အဲဒီစာပေအနုပညာဟာ ပစ္စည်းမဲ့လူတန်းစားအတွက် အခြေခံအားဖြင့် ကောင်းသလား၊ ဆိုးသလားဆိုတာကို အဓိကထားကြည့်ရလိမ့်မယ်လို့ ကျွန်တော်ထင်ပါတယ်။ အခြေခံအားဖြင့်ဆိုရင် အဲ့ဒီစာပေအနုပညာကို ဝေဖန်ဖွင့်ချတိုက်ခိုက်ရမယ်။ အခြေခံအားဖြင့်ကောင်းရင် ဒီအခြေခံအားကောင်းချက်ကို အသိအမှတ်ပြုပြီး ချွတ်ယွင်းချက်၊ အားနည်းချက်ကို ကူညီဖေးမတဲ့သဘောနဲ့ ထောက်ပြရမယ်။ ဒီနည်းအားဖြင့် စာပေအနုပညာကို ပိုမိုကောင်းမွန်အောင်၊ တိုးတက်အောင်လုပ်ပေးသင့်တယ်လို့ထင်တယ်” လို့ ဆရာမြသန်းတင့်က စာပေဝေဖန်ရေးအပေါ် သူ့ရဲ့အမြင်ကို ပြောထားပါတယ်။ ဒီစာအုပ်မှာ ဆရာမြသန်းတင့်ငယ်စဉ်က စွဲလန်းကြိုက်နှစ်သက်ခဲ့တဲ့ ဝတ္ထုဆယ်ပုဒ်ကိုပြန်တွေးပြီး စာပေဝေဖန်ရေးပုံစံ ပြန်ရေးထားတာပါ။ စာပေဝေဖန်ရေးဆိုတာ စာမျက်နှ ာပေါ်မတင်ပြကြရင်တောင် လေထန်ကုန်းမှာ သွားပြီးဆွေးနွေးလေ့ရှိကြတဲ့အတွက် ဒီစာအုပ်ဟာ ဖတ်ရှုသူတွေကို တော်တော်အကြိုက်တွေ့စေမှာ အသေအချာပါပဲ။ ဒီစာအုပ်ထဲမှာ ဓား၊ မေ၊ သပိတ်မှောက်ကျောင်းသား၊ နေညိုညိုတို့လို နာမည်ကြီးစာရေးဆရာကြီးတွေရဲ့ ဝတ္တုတွေကို ဝေဖန်ရေးသားထားတာဖြစ်တဲ့အတွက် စပေချစ်ပရိသတ်တို့ရဲ့ ငယ်ဘဝကိုလည်း ပြန်ပြီးတော့အမှတ်ရစေမှာပါ။
        <div class="detailButton">
          <a href="{{asset('pdfs/7_1718352422' )}}" download><button type="button" class="btn btn-orange">Download <i class="fa-solid fa-circle-down"></i></button></a>
          <a href="{{asset('pdfs/7_1718352422' )}}" target="_blank"><button type="button" class="btn btn-orange">Read Online <i class="fa-solid fa-eye"></i></button></a>
        </div>
      </div>
    </div>
  </div>

  <div class="detailContainer mySlides">
    <div class="insideDetailTextContainer row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
      <div class="imageContainer" style="width: 30%;">
        <img src="{{asset('images/mtt_teashop.jpg')}}" alt="image" width=" 352px" height="485px">
      </div>
      <div style="width: 60%;" class="detailTextContainer">
        <h5 class="detailText author">မြသန်းတင့်</h5>
        <h3 class="detailText status">လက်ဖက်ရည်ဆိုင်</h3>
        <h5 class="detailText category">သင်ခန်းစာ စာအုပ်</h5>
        <p class="detailText desciption">ဒီစာအုပ်ထဲမှာ စာမျက်နှာ နည်းနည်းလေးပဲပါတယ်။ အချိန်နည်းနည်းလေး ပေးဖတ်ရင် ပြီးတဲ့စာအုပ်။ စာမျက်နှာနည်းသလောက် ရင်ဘတ်ထဲမှာ လုံးဝ စွဲကျန်စေနိုင်တဲ့ စာအုပ်လေးပါပဲ။ တရုတ်စာရေးဆရာကြီး လောရှိရဲ့ ‘လက်ဖက်ရည်ဆိုင်’ ပြဇာတ်ကို ဆရာကြီး မြသန်းတင့်က မြန်မာပြန်ဆိုထားတာ ဖြစ်ပါတယ်ဗျ။ ဒီပြဇာတ်ဟာ တရုတ်ပြည်တစ်နေရာထဲတင် မဟုတ်ပါဘူး။ နိုင်ငံတကာမှာလည်း ထင်ရှားသလို ဂျပန်၊ အနောက်ဂျာမဏီနဲ့ အမေရိကန်ပြည်ထောင်စုတို့မှာ ပြဇာတ်အဖြစ် စင်တင်ကပြတော့လည်း လူကြိုက်များခဲ့ကြပါတယ်။ ဆရာမြသန်းတင့် မြန်မာပြန်ဆိုလိုက်တော့လည်း ဖတ်တဲ့သူတိုင်း သဘောကျကြတယ်။ ‘လက်ဖက်ရည်ဆိုင်’ ကို နောက်ခံပြုပြီး တရုတ်ပြည်တွင်း ပြောင်းလဲနေတဲ့ အခြေအနေ အရပ်ရပ်ကို ဖော်ပြသွားပုံက သိပ်ကို လက်ရာမြောက် ပြဇာတ်တစ်ပုဒ်ပါပဲ။
        <div class="detailButton">
          <a href="{{asset('pdfs/7_1718352422' )}}" download><button type="button" class="btn btn-orange">Download <i class="fa-solid fa-circle-down"></i></button></a>
          <a href="{{asset('pdfs/7_1718352422' )}}" target="_blank"><button type="button" class="btn btn-orange">Read Online <i class="fa-solid fa-eye"></i></button></a>
        </div>
      </div>
    </div>
  </div>

  <div class="detailContainer mySlides">
    <div class="insideDetailTextContainer row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
      <div class="imageContainer" style="width: 30%;">
        <img src="{{asset('images/WayToTalkWithEverybody.jpg')}}" alt="image" width=" 352px" height="485px">
      </div>
      <div style="width: 60%;" class="detailTextContainer">
        <h5 class="detailText author">မောင်မြတ်မိုး</h5>
        <h3 class="detailText status">အချိန်တိုင်းနေရာတိုင်း၌ လူတိုင်းနှင့်စကားပြောနည်း</h3>
        <h5 class="detailText category">
          သင်ခန်းစာ စာအုပ်</h5>
        <p class="detailText desciption">စာရေးဆရာ မြတ်မိုး ရေးထားတဲ့ အချိန်တိုင်း၊ နေရာတိုင်း၌ လူတိုင်းနှင့်စကားပြောနည်းဟာ ကာလ၊ ဒေသ၊ အခြေအနေနဲ့အညီ စကားပြောဆိုနည်း ကို အခန်းပေါင်း (၁၂) ခန်းဖြင့် ဝေေ၀ဆာဆာ ဖော်ပြထားရာတွင် ကိုယ်တိုင်အတွေ့အကြုံများသာမက အောင်မြင်နေသော စကားပြောကောင်းသူ ပုဂ္ဂိုလ်များ၌ တွေ့ရသော တူညီတဲ့အရည်အချင်းများကို ထည့်သွင်းထားပြီး တင်ပြရာ၌ပညာရပ်ဆန်ဆန်ပုံစံမျိုး၌ ရေးသားထားခြင်းမဟုတ်ဘဲ လူတစ်ယောက်အောင်မြင်ဖို့အတွက် စကားပြောကောင်းရမယ်ဆိုတာ အမှန်တကယ် မှတ်သားထိုက်ပါတယ်။ အောင်မြင်ရေးနည်းလမ်းကောင်းများအတိုင်း လိုက်နာပြီး အလုပ်ကြိုးစားရုံဖြင့် ဘဝတွင် အောင်မြင်မှုအထွတ်အထိပ်မရရှိပုံကို စာအုပ်လေးက အလေးထားဖော်ပြထားပါတယ်။ တွေ့ကြုံရမဲ့ အခြေအနေများကို ပေါ့ပေါ့ပါးပါး တင်ပြထားတဲ့အတွက် စာချစ်သူများ ဖတ်ပြီး အကြိုက်တွေ့စေမယ်လို့ ယုံကြည်ပါတယ်။
        <div class="detailButton">
          <a href="{{asset('pdfs/7_1718352422' )}}" download><button type="button" class="btn btn-orange">Download <i class="fa-solid fa-circle-down"></i></button></a>
          <a href="{{asset('pdfs/7_1718352422' )}}" target="_blank"><button type="button" class="btn btn-orange">Read Online <i class="fa-solid fa-eye"></i></button></a>
        </div>
      </div>
    </div>
  </div>


  <div class="detailContainer mySlides">
    <div class="insideDetailTextContainer row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
      <div class="imageContainer" style="width: 30%;">
        <img src="{{asset('images/mts_yaynantharkhinkhingyi_2.jpg')}}" alt="image" width=" 352px" height="485px">
      </div>
      <div style="width: 60%;" class="detailTextContainer">
        <h5 class="detailText author">မောင်သိန်းဆိုင်</h5>
        <h3 class="detailText status">ရေနံ့သာခင်ခင်ကြီး</h3>
        <h5 class="detailText category">ဝတ္ထုစာအုပ်</h5>
        <p class="detailText desciption">ဆရာမောင်သိန်းဆိုင်ရဲ့ ဂန္ထဝင်လက်ရာ ဝတ္ထုရှည်တစ်ပုဒ်။ မောင်သိန်းဆိုင်ဆိုတဲ့ ကလောင်နာမည်နဲ့ တွဲဖက်ပြီး စာချစ်သူတွေ မှတ်မိနေကြတဲ့ ရေနံ့သာခင်ခင်ကြီး။ ဘယ်လိုပဲ ဖြစ်ဖြစ်၊ ရေနံ့သာခင်ခင်ကြီးဆိုတဲ့ ဝတ္ထုကတော့ စာဖတ်ပရိသတ်တွေရဲ့ နှလုံးသားထဲမှာ ရုပ်လုံးကြွ အသက်ဝင်ပြီးသား၊ ပုံရိပ်တွေ ရှင်သန်နိုးကြားပြီးသားပါပဲ။ ရေနံ့သာခင်ခင်ကြီးဆိုတဲ့ အမျိုးသမီးတစ်ယောက်ရဲ့ နာကြည်းဖွယ်၊ စက်ဆုပ်ဖွယ်၊ အံ့သြဖွယ်၊ အတုယူဖွယ်၊ လေးစားဖွယ်၊ ရွံမုန်းဖွယ် ဘဝအဖြစ်အပျက်၊ ခံစားချက်တွေကို လွမ်းမောဖွယ်ရာကောင်းအောင် အသက်သွင်းရေးဖွဲ့ထားတဲ့ ဝတ္ထုပါ။ လူလတ်တန်းစားနဲ့ အထက်တန်းစားတို့ရဲ့ ဘဝကို အခြေပြု၊ မိသားစုနှစ်ခုရဲ့ မာနနဲ့ အာဃာတကို အခြေပြု၊ ချစ်သူနှစ်ဦးရဲ့ ကံကြမ္မာ လှည့်စားမှုနဲ့ သံသယတို့ကို အခြေပြုတဲ့ စိတ်လှုပ်ရှား ဆွတ်ပျံ့ဖွယ်ရာ ဝတ္ထုရှည်ကြီးတစ်ပုဒ် ဖြစ်ပါတယ်။ စံအိမ်ကို ဖျက်ဆီးဖို့ ကြံစည်အားထုတ်နေတဲ့ ဦးကောင်းမိုးရယ်၊ ဦးကောင်းမိုးရဲ့ အကြံကို ခြေတစ်လှမ်းဦးပြီး ရိပ်မိနေတဲ့ ဦးအောင်ခန့်ရယ်၊ ဦးကောင်းမိုးရဲ့သား မောင်မောင်ဦးနဲ့ ခင်ခင်ကြီးတို့ရဲ့ ဆွတ်ပျံ့ဖွယ်ရာ အချစ်ဇာတ်လမ်းလေးရယ်၊ ရေနံချောင်းက ရေနံ့သာစံအိမ်ကြီးရယ်၊ ဂျပန်ခေတ် အရှုပ်အထွေးတွေနဲ့ စာဖတ်သူကို ဆွဲဆောင်သွားမယ့် ရသဝတ္ထုရှည်တစ်ပုဒ်ပါပဲ။

        <div class="detailButton">
          <a href="{{asset('pdfs/7_1718352422' )}}" download><button type="button" class="btn btn-orange">Download <i class="fa-solid fa-circle-down"></i></button></a>
          <a href="{{asset('pdfs/7_1718352422' )}}" target="_blank"><button type="button" class="btn btn-orange">Read Online <i class="fa-solid fa-eye"></i></button></a>

        </div>
      </div>
    </div>
  </div>

  <button class="toLeft carousel-control-prev" onclick="plusDivs(-1)">&#10094;</button>
  <button class="toRight carousel-control-next" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
  }
</script>

<h4 class="gridContainerTitle my-4">Latest Updated Books</h4>
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">

  @foreach ($books as $book) :



  <div class="imageBox ">
    <a href="{{url('guest/detail/'.$book->id)}}">
      <img class="imageImageBox" src="{{asset('images/' . $book -> image)}}" alt="image" height="309px" width="224px" />
      <div class=" title"><i class="fa-solid fa-magnifying-glass"></i>
      </div>

      <p style="color:black;" class="authorIndex">{{ $book->author ? $book->author->author_name : 'something is missing!!!' }}</p>
      <p style="color:black" class="statusIndex"><?php echo htmlspecialchars($book->name); ?></p>
    </a>
  </div>
  @endforeach
</div>


@endsection