<?php

namespace App\Http\Controllers;

use App\ReportPoint;
use App\Marker;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function loadForm($reportName){
      return
        '{
          "$schema": "http://json-schema.org/draft-04/schema#",
          "type": "object",
          "title": "' . ucfirst($reportName) .'",
          "properties": {
            "name": {
              "type": "string",
              "minLength": 8,
              "maxLength": 80,
              "attrs": {
                "placeholder": "Full Name",
                "title": "Please enter your full name"
              }
            },
            "email": {
              "type": "string",
              "maxLength": 120,
              "attrs": {
                "type": "email",
                "placeholder": "Email"
              }
            },
            "lists": {
              "type": "string",
              "enum": ["Daily New", "Promotion"]
            }
          },
          "additionalProperties": false,
          "required": ["name", "email", "lists"]
      }
      ';
    }
}
