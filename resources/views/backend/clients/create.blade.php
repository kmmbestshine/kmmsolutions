@extends('layouts.backend.main')

@section('title', 'MyBlog | ' )

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
               
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> <a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="{{ route('backend.client.index') }}">All Cients</a></li>
               
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                           <form action="{{ route('backend.client.store') }}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                     <label for="state">Select State: </label>
                                   <select name="state" id="countySel" size="1" class="form-control">
                                    <option value="" selected="selected">Select State</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                                <label>Select District:</label>
                                                 <select name="district" id="stateSel" size="1" class="form-control">
                                                <option value="" selected="selected">Please select State first</option>
                                                </select>
                                            </div>
                                <div class="form-group">
                                    <label for="taluka"> Select Taluk / Teshil:  </label>
                                   <select name="taluka" id="districtSel" size="1" class="form-control">
                                    <option value="" selected="selected">Please select District first</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                    <span class="error"><b>
                                           @if($errors->has('name'))
                                                {{$errors->first('name')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Company Name*</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company_name">
                                    <span class="error"><b>
                                           @if($errors->has('company_name'))
                                                {{$errors->first('company_name')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                            <label for="softwaretype">Software Type*</label>
                                            <select id="softwaretype" name="softwaretype" class="form-control" required>
                                                    <option value="">Select Software Type</option>
                                                    <option value="school">School Software</option>
                                                    <option value="hospital">Hospital Software</option>
                                                    <option value="supermarket">SuperMarket Software</option>
                                                    <option value="inventory">Inventory Software</option>
                                                    <option value="hotel">Hotel Software</option>
                                                    <option value="ecommerce">E-Commerce Software</option>
                                                    <option value="realestate">Real Estate Software</option>
                                            </select>
                                        </div>
                                
                                <div class="form-group">
                                    <label for="pri_mobile">Primary Mobile*</label>
                                    <input type="text" class="form-control" id="pri_mobile" name="pri_mobile" placeholder="Enter Mobile No">
                                    <span class="error"><b>
                                           @if($errors->has('pri_mobile'))
                                                {{$errors->first('pri_mobile')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="sec_mobile">Secondary Mobile*</label>
                                    <input type="text" class="form-control" id="sec_mobile" name="sec_mobile" placeholder="Enter Mobile No">
                                    <span class="error"><b>
                                           @if($errors->has('sec_mobile'))
                                                {{$errors->first('sec_mobile')}}
                                            @endif</b>
                                     </span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                    <span class="error"><b>
                                           @if($errors->has('email'))
                                                {{$errors->first('email')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address*</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                    <span class="error"><b>
                                           @if($errors->has('address'))
                                                {{$errors->first('address')}}
                                            @endif</b>
                                     </span>
                                </div>
                                <div class="form-group">
                                    <label for="landmark">Land Mark</label>
                                    <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter Land Mark">
                                    <span class="error"><b>
                                           @if($errors->has('landmark'))
                                                {{$errors->first('landmark')}}
                                            @endif</b>
                                     </span>
                                </div>
                                
                                
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary" >Save Customer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
<script>
    $('#name').on('blur', function(){
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
                                .replace(/[^a-z0-9-]+/g, '-')
                                .replace(/\-\-+/g, '')
                                .replace(/^-+|-+$/g, '');

        slugInput.val(theSlug);
    });
    var bioEditor = new SimpleMDE({ element: $("#bio")[0] });
</script>
<script>
         var stateObject = {
        "Tamilnadu": {
         "Ariyalur": ["Udayarpalayam", "Ariyalur","Sendurai","Andimadam"],
        "Chengalpattu": ["Chengalpattu", "Cheyyur","Madhurantakam", "Pallavaram","Tambaram", "Thirkkalukundram","Thirupporur", "Vandalur"],
        "Chennai": ["Alandur", "Ambattur","Aminjikarai", "Ayanavaram","Egmore", "Guindy",
                    "Madhavaram", "Maduravoyal","Mambalam", "Mylapore","Perambur", "Purasawalkam","Sholinganallur", 
                    "Thiruvottiyur","Tondiarpet", "Velachery"],
        "Coimbatore": ["Anaimalai", "Annur","Coimbatore(North)", "Coimbatore(South)","Kinathukadavu", "Madukkarai",
                    "Mettupalayam", "Perur","Pollachi", "Sulur","Valparai"],
        "Cuddalore": ["Bhuvanagiri", "Chidambaram","Cuddalore", "Kattumannarkoil","Kurinjipadi", "Panruti",
                    "Srimushanam", "Titakudi","Veppur", "Vridachalam"],
        "Dharmapuri": ["Dharmapuri", "Harur","Karimangalam", "Nallampalli","Palakcode", "Pappireddipatti",
                    "Pennagaram"],
        "Dindigul ": ["Attur", "Dindigul East","Dindigul West", "Gujiliamparai","Kodaikanal", "Natham",
                    "Nilakottai", "Oddenchatram","Palani", "Vedasandur"],
        "Erode  ": ["Anthiyur", "Bhavani","Erode", "Gobichettipalayam","Kodumudi", "Modakkurichi",
                    "Nambiyur", "Perundurai","Sathyamangalam", "Thalavadi"],
        "Kallakurichi ": ["Chinnaselam", "Kallakurichi","Kalvarayan hills", "Sankarapuram","Tirukkoilur", "Ulundurpet"],
        "Kancheepuram ": ["Kancheepuram", "Kundrathur","Sriperumbudur", "Uthiramerur","Walajabad"],
        "Kanyakumari ": ["Agasteeswaram", "Kalkulam","Killiyoor", "Thiruvattar","Thovalai", "Vilavancode"],
         "Karur ": ["Aravakurichi", "Kadavur","Karur", "Krishnarayapuram","Kulithalai", "Manmangalam","Pugalur"],
        "Krishnagiri ": ["Anchetty", "Bargur","Denkanikottai", "Hosur","Krishnagiri", "Pochampalli","Shoolagiri","Uthangarai"],
        "Madurai": ["Kalligudi", "Madurai East","Madurai North", "Madurai(South)","Madurai West", "Melur",
                    "Peraiyur", "Thirupparankundram","Tirumangalam", "Usilampatti","Vadipatti"],
        "Nagapattinam  ": ["Kilvelur", "Kutthalam","Mayiladuthurai", "Nagapattinam","Sirkali", "Tharangambadi",
                    "Thirukkuvalai", "Vedaranyam"],
        "Namakkal  ": ["Kolli Hills", "Kumarapalayam","Mohanur", "Namakkal","Paramathi Velur", "Rasipuram",
                    "Sendamangalam", "Thiruchengode"],
        "Perambalur  ": ["Alathur", "Kunnam","Perambalur", "Veppanthattai"],
        "Pudukottai": ["Alangudi", "Aranthangi","Avadaiyarkoil", "Gandarvakottai","Illuppur", "Karambakudi",
                    "Kulathur", "Manamelkudi","Ponnamaravathi", "Pudukkottai","Thirumayam","Viralimalai"],
        "Ramanathapuram": ["Kadaladi", "Kamuthi","Kilakarai", "Mudukulathur","Paramakudi", "Rajasingamangalam",
                    "Ramanathapuram", "Rameswaram","Tiruvadanai"],
         "Ranipet  ": ["Arakkonam", "Arcot","Nemili", "Walajah"],
         "Salem": ["Attur", "Edapady","Gangavalli", "Kadayampatti","Mettur", "Omalur",
                    "Pethanaickenpalayam", "Salem","Salem South", "Salem West","Sangagiri","Valapady","Yercaud"],
        "Sivagangai": ["Devakottai", "Ilayankudi","Kalaiyarkoil", "Karaikudi","Manamadurai", "Sigampunari",
                    "Sivaganga", "Thiruppuvanam","Tirupathur"],
         "Tenkasi": ["Alangulam", "Kadayanallur","Sankarankovil", "Shencottai","Sivagiri", "Tenkasi",
                    "Thiruvengadam", "V.K.Pudur"],
        "Thanjavur": ["Budalur", "Kumbakonam","Orathanadu", "Papanasam","Pattukkottai", "Peravurani",
                    "Thanjavur", "Thiruvaiyaru","Thiruvidaimarudur"],
        "Theni": ["Andipatti", "Bodinayakanur","Periyakulam", "Theni","Uthamapalayam"],
        "The Nilgiris": ["Coonoor", "Gudalur","Kotagiri", "Kundah","Kundah","Udhagamandalam"],
        "Thirunelveli": ["Ambasamuthiram", "Cheranmahadevi","Manur", "Nanguneri","Palayamkottai","Radhapuram","Thisayanvilai","Tirunelveli"],
        "Thiruvallur": ["Avadi", "Gummidipoondi","Pallipattu", "Ponneri","Poonamallee","R.K. Pettai","Tiruttani","Tiruvallur","Uthukkotai"],
        "Thiruvannamalai": ["Arani", "Chengam","Chetpet", "Jamunamarathoor","Kalasapakkam","Kilpennathur","Periyakulam","Polur","Thandarampattu","Tiruvannamalai","Vandavasi","Vembakkam"],
        "Thiruvarur": ["Koothanallur", "Kudavasal","Mannargudi", "Nannilam","Needamanglam","Thiruthuraipoondi","Thiruvarur","Valangaiman"],
         "Tirupathur": ["Ambur", "Natrampalli","Tirupattur", "Vaniyambadi"],
        "Tiruppur": ["Avinashi", "Dharapuram","Kangayam", "Madathukulam","Palladam","Tiruppur North","Tiruppur South","Udumalpet","Uthukuli"],
        "Trichirappalli": ["Lalgudi", "Manachanallur","Musiri", "Srirangam","Thiruchirapalli-West","Thiruverumpur","Thottiyam","Thuraiyur","Tiruchirappalli-East"],
        "Tuticorin": ["Eral", "Ettayapuram","Kayathar", "Kovilpattai","Ottapidaram","Sathankulam","Srivaikundam","Thoothukkudi","Tiruchendur","Vilathikulam"],
         "Vellore": ["Anaicut", "Gudiyatham","Katpadi", "K V Kuppam","Pernambut","Vellore"],
         "Viluppuram": ["Gingee", "Kandachipuram","Marakkanam", "Melmalaiyanur","Thiruvennainallur","Tindivanam","Vanur","Vikkiravandi","Villupuram"],
         "Virudhunagar": ["Arupukottai", "Kariapattai","Rajapalayam", "Sathur","Sivakasi","Srivilliputhur","Tiruchuli","Vembakkottai","Virudhunagar","Watrap"],
        },
        "Pondicherry/Puducherry": {
         "Pondicherry/Puducherry": ["Bahour", "Ozhukarai","Puducherry","Villianur"],
        "Karaikkal": ["Poovam", "Thiruvettakudy","Varichikudy", "Kil Vanjiyur","Mel Vanjiyur", "Keezhaiyur","Polagam"],
        "Mahe": ["Mahe", "Pandakkal","Chalakara", "Palloor","Kallayi"],
        "Yanam": ["Yanam"],
        },
         
        }
        window.onload = function () {
        var countySel = document.getElementById("countySel"),
        stateSel = document.getElementById("stateSel"),
        districtSel = document.getElementById("districtSel");
        for (var country in stateObject) {
        countySel.options[countySel.options.length] = new Option(country, country);
        }
        countySel.onchange = function () {
        stateSel.length = 1; // remove all options bar first
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done
        for (var state in stateObject[this.value]) {
        stateSel.options[stateSel.options.length] = new Option(state, state);
        }
        }
        countySel.onchange(); // reset in case page is reloaded
        stateSel.onchange = function () {
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done
        var district = stateObject[countySel.value][this.value];
        for (var i = 0; i < district.length; i++) {
        districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
        }
        }
        }
    </script>
@endsection