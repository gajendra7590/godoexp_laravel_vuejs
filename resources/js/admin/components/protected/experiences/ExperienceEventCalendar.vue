<template>
<div class="content-wrapper">
    <loading :active.sync="isLoading"
        :can-cancel = "false"
        :is-full-page = "true"
        :opacity = "0.9"
        :width = '30'
        :height = '30'
        :zIndex =  '999999'
    />
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Experiences Schedules
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">Experience Schedules</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Experience Schedules</h3>
                </div>
                <div class="box-body">
                    <div class="col col-md-12">
                        <div class="row">
                            <section class="corona-frm--cst">
                                <div class="exp__Frm--ele">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-6">
                                            <!-- Corona Ele Start -->
                                            <div class="corona_ele">
                                                <!-- Corona Frm Start -->
                                                <div class="corona-frm">
                                                    <div class="row">
                                                        <form>
                                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                                <input type="hidden" name="experience_id" value="40" id="experience_id">
                                                                <input type="hidden" name="date_save_url" value="/godoexperience-php/admin/web/experiences/save-revoke-date?id=40" id="date_save_url">
                                                                <div class="corona-month">
                                                                    <label class="label_modifier">Year <sub class="text-danger">*</sub></label>
                                                                    <select
                                                                        class="form-control input_modifier select_mod"
                                                                        id="select_year"
                                                                        @change="changeYear"
                                                                    >
                                                                        <optgroup label="---- Select Year ----">
                                                                            <option
                                                                                v-for="(y,key) in getYears()"
                                                                                :key="key"
                                                                                :selected="selectedYear == y"
                                                                                :value="y">
                                                                                {{ y }}
                                                                            </option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                                                                <div class="corona-day">
                                                                    <label class="label_modifier">Month <sub class="text-danger">*</sub></label>
                                                                    <select
                                                                        class="form-control input_modifier select_mod"
                                                                        id="select_month"
                                                                        @change="changeMonth"
                                                                        >
                                                                        <optgroup label="---- Select Month ----">
                                                                            <option
                                                                                v-for="(m,key) in getMonths()"
                                                                                :key="key"
                                                                                :selected="selectedMonth == m"
                                                                                :value="(key+1).toString().padStart(2, 0)">
                                                                                {{ m }}
                                                                            </option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Corona Frm Closed -->
                                                <!-- Dynamic append calendar here -->
                                                <div id="calendar_container">
                                                    <!-- Corona list Area Start -->
                                                    <div class="corona_ele-list">
                                                        <div class="corona_ele-title">
                                                            <h4>Choose Events Date : {{ selectedMonth + ' - '+selectedYear}}</h4>
                                                        </div>
                                                        <div class="corona_ele-item"
                                                        v-for="(n,key) in daysName()" :key="key+12">
                                                            <div class="corona_nme-day" :title="n">
                                                                {{ n }}
                                                            </div>
                                                        </div>
                                                        <div
                                                        v-for="num in monthStartDay" :key="num+145"
                                                        class="corona_ele-item">
                                                            <div class="corona_ele-mod corona_Disable"
                                                                 title="30 Mar 2020">
                                                                <span>
                                                                   {{ (lastMonthDays - monthStartDay) + num }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="corona_ele-item" v-for="n in currentMonthDays" :key="n+245">
                                                            <div
                                                             class="corona_ele-mod"
                                                            :class="addClass(selectedYear+'-'+selectedMonth+'-'+n)"
                                                            @click.prevent="saveDate(selectedYear,selectedMonth,n)"
                                                            :data-value="n.toString().padStart(2, 0)"
                                                            :title="n+' '+selectedMonth+' '+selectedYear"><span>{{ n }}</span></div>
                                                        </div>

                                                    </div>
                                                    <!-- Corona list Area Closed -->
                                                </div>

                                            </div>
                                            <!-- Corona Ele Closed -->
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6"></div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

</template>
<script>
// this.$moment('2020-03').startOf('month').format('d')
export default {
	name: "ExperienceEventsSchedule",
	components: {},
	data: function() {
		return {
            isLoading : false,
            selectedMonth : this.$moment().format('MMMM'),
            selectedYear :  this.$moment().format('YYYY'),
            currentMonthDays : 0,
            lastMonthDays : 0,
            monthStartDay : 0,
            existingSavedDates : [],
        };
	},
	methods: {
        getMonths : function(){
            return this.$moment.months();
        },
        getYears : function(){
             const year = new Date().getFullYear()
             const backYear = year - 5;
             return Array.from({ length: year - backYear }, (value, index) => year - index)
        },
        getMonthStartDay :  function(month,year){
            let currentMonth = (month == undefined) ? this.$moment().format('MM') : month;
            let currentYear = (year == undefined) ? this.$moment().format('YYYY') : year;
            let days = this.$moment(currentYear+'-'+currentMonth).startOf('month').format('d');
            this.monthStartDay = parseInt(days);
        },
        gettotalDaysInMonth : function(month,year){
            let currentMonth = (month == undefined) ? this.$moment().format('MM') : month;
            let currentYear = (year == undefined) ? this.$moment().format('YYYY') : year;
            this.currentMonthDays = this.$moment(currentYear+'-'+currentMonth, "YYYY-MM").daysInMonth();
        },
        gettotalDaysInLastMonth : function(month,year){
            let currentMonth = ( (month == undefined) ? this.$moment().format('MM') : month) - 1;
            let currentYear = (year == undefined) ? this.$moment().format('YYYY') : year;
            if(currentMonth == 0){
                currentMonth = 12;
                currentYear = currentYear - 1;
            }
            this.lastMonthDays = this.$moment(currentYear+'-'+currentMonth, "YYYY-MM").daysInMonth()
        },
        setValues : function(){

            let m = this.$moment(this.selectedMonth,'MMM').format('M');
            let y = this.selectedYear;

            this.getScheduleDates(y,m);
            this.getMonthStartDay( this.currentMonth ,this.currentYear );
            this.gettotalDaysInMonth( this.currentMonth ,this.currentYear );
            this.gettotalDaysInLastMonth( this.currentMonth ,this.currentYear );
        },
        daysName : function(){
            return {'01':'Sun','02':'Mon','03':'Tue','04':'Wed','05':'Thu','06':'Fri','07':'Sat'};
        },
        addClass : function(date){
            let cdate = this.$moment(date).format('YYYY-MM-DD');
            let d = this.$moment(date).format('D');
            let now = this.$moment().format('YYYY-MM-DD');

            var cls = ( this.existingSavedDates.includes(d) == true ) ? 'corona_Active':'';
            if(now > cdate){
                return 'corona_Disable '+cls;
            }else{
                return 'date_change_event '+cls;
            }
        },
        changeYear : function(e){
            this.currentYear = e.target.value;
            this.selectedYear = e.target.value;
            this.setValues();
        },
        changeMonth : function(e){
            this.currentMonth = e.target.value;
            this.selectedMonth = this.$moment(e.target.value, 'M').format('MMMM');
            this.setValues();
        },
        saveDate:function(y,m,d){
            m = this.$moment(m, 'MMMM').format('M');
            let payload = { id : this.$route.params.id,y : y,m:m,d:d}
            let $this = this;
            $this.isLoading = true;
            this.$store.dispatch('saveScheduleDates',payload)
            .then(function(response){
                if(response.status == true){
                     $this.getScheduleDates(y,m)
                     $this.$toastr.s('New event date saved','Success');
                }else if(response.status == false){
                    $this.$toastr.e(response.message,'Error');
                }else{
                    $this.$toastr.e('Something went wrong please check');
                }
                $this.isLoading = false;
            });

        },
        getScheduleDates : function(y,m){
            let payload = { id : this.$route.params.id,y : y,m:m}
            let $this = this;
            $this.isLoading = true;
            this.$store.dispatch('getScheduleDates',payload)
            .then(function(response){
                $this.existingSavedDates = response;
                 $this.isLoading = false;
            });
        }

    },
	created() {
        this.gettotalDaysInMonth();
        this.gettotalDaysInLastMonth();
        this.getMonthStartDay();
        this.getScheduleDates();
    }
};
</script>
<style scoped>
@media  only screen and (min-width: 768px) {
    .col-sm-12 {
        width: auto;
    }
}

.corona_ele,
.corona-frm,
.corona-frm--cst,
.corona_ele-list {
	float: left;
	width: 100%;
}

.corona-day {
	margin-left: -15px;
}

.corona-day,
.corona-month {
	margin-bottom: 15px;
}

.corona_ele-item {
	float: left;
	width: 14.222%;
	padding-left: 2px;
	padding-right: 2px;
}

.corona_ele-list {
	margin: 10px 0;
	border: 1px solid #e7e7e7;
	padding: 20px 10px 5px 10px;
	position: relative;
}

.corona_ele-mod {
	font-weight: 600;
	background-color: rgb(235, 235, 235);
	color: rgb(151, 151, 151);
	line-height: 60px;
	text-align: center;
	display: block;
	cursor: pointer;
	height: 60px;
	font-size: 17px;
	margin-bottom: 3px;
}

.corona_ele-mod:hover {
	background-color: rgba(242, 242, 242, 0.5);
}

.corona_Active {
	background-color: #717171;
	color: #fff;
}

.corona_Active:hover {
	background-color: #848282;
}

.corona_Disable {
	pointer-events: none;
	opacity: 0.6;
}

.corona_Disable span {
	position: relative;
}

.corona_Disable span::before {
	position: absolute;
	content: "";
	top: -7px;
	width: 2px;
	height: 36px;
	z-index: 999;
	transform: rotate(50deg);
	right: 5px;
	background-color: rgba(11, 8, 39, 0.2);
	display: block;
}

.corona_ele-title h4 {
	position: absolute;
	top: -11px;
	background: #fff;
	padding: 0 15px;
}

.corona_nme-day {
	text-align: center;
	margin-bottom: 15px;
	font-weight: 600;
	text-transform: capitalize;
	font-size: 14px;
	color: #757575;
}

.corona_ele-day {
	float: left;
	width: 100%;
}

.date-not-editable {
	background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' version='1.1' preserveAspectRatio='none' viewBox='0 0 100 100'><path d='M100 0 L0 100 ' stroke='black' stroke-width='1'/><path d='M0 0 L100 100 ' stroke='black' stroke-width='1'/></svg>");
	background-repeat: no-repeat;
	background-position: center center;
	background-size: 100% 100%, auto;
	border: solid red 2px;
	width: auto;
}
</style>
