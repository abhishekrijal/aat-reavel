<div class="form-group">
    <label class="pull-left">Full Name<span class="required-red "> &nbsp; *</span></label>
[text* hire-fullname id:txtFullName class:form-control]
</div>
<div class="form-group">
    <label class="pull-left">Email<span class="required-red "> &nbsp; *</span></label>
[email* client-email id:txtEmail class:form-control]
</div>
<div class="form-group">
    <label class="pull-left">Who do you want to hire?<span class="required-red"> &nbsp; *</span></label> [checkbox* hire-who class:clearfix "Reviewer" "Developer" "Customizer"]
</div>
<div class="form-group">
    <label class="pull-left">Please create a title for your task<span class="required-red "> &nbsp; *</span></label> [text* hire-title id:txtTaskTitle class:form-control]
</div>
<div class="form-group">
    <label class="pull-left">Describe your task in as much detail as possible <span class="required-red "> &nbsp; *</span></label>
    [textarea* task-detail id:contact_message class:form-control 40x5]

</div>
<div class="form-group">
    <label class="pull-left">Please estimate your budget for this task <span class="required-red "> &nbsp; *</span></label>
    [select* hire-cost id:ddm_budget class:form-control "Less Than $50" "$100-$500" "More Than $500"]
</div>
<label class="cf7-spcl">Submitted From
[text submitted_site id:hiddenURL class:cf7-spcl]
<div class="form-group">
[recaptcha size:compact]
</div>
<div class="row">
    <div class="col-md-12">
[response]
[submit class:btn class:btn-two class:btn-lg "POST YOUR WORDPRESS TASK"]
&nbsp;&nbsp;&nbsp; <br><em>We will contact you soon!!</em>                   
    </div>