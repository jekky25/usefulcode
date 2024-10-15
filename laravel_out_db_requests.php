<?php
use DB;
DB::enableQueryLog();


dump(DB::getQueryLog());
