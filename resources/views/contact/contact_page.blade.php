@include('layouts.header')

<div class="row" >
    <div class="col-5" >
        <h4>Get in touch</h4>
        <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores blanditiis dolores, accusamus illum commodi esse ut fuga eveniet maxime labore.</p>

        <p> 742 Evergreen Terrace Springfield, OR 12345</p>

        <p>tel +1(555) 123-4567</p>

        <p>Email support@example.com</p>

        <p>Looking for careers? <a href="#">View all job openings </a></p>
    </div>
    <div class="col-7" >
        <livewire:contact-form />
    </div>
</div>



@include('layouts.footer');
<script type="text/javascript">
    $(document).ready(function(){
        // alert("Jqury is loaded");
        // $('#name').val("Htoo Maung Thait");
    });
</script>
