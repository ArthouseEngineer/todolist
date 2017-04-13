<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 08.04.2017
 * Time: 13:18
 */
  $items =   Array(
      0 => Array (
          'title' => 'Home',
          'children' => Array(),

      ),
      1 => Array(
          'title' => 'Parent',
          'children' => Array(
              0 => Array(
                  'title' => 'Sub 1',
                  'children' => Array(),
              ),
              1 => Array(
                  'title' => 'Sub 2',
                  'children' => Array(
                      0 => Array(
                          'title' => 'Sub sub 2-1',
                          'children' => Array(),
                      ),
                  ),
              ),
          )
      )
  );