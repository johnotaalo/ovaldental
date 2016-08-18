<?php

defined("BASEPATH") or exit("No direct script access allowed");

$config['upload_path'] = './uploads/';

$config['allowed_types'] = 'gif|jpg|png';

$config['max_size'] = 1000;

$config['stored_upload_path'] = base_url('uploads') . '/';