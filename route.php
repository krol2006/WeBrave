<?php
  function parse($path){
    $languages = ["ru", "en", "cz"];
    $defaultLanguage = "ru";

    // tear the route apart
    $parts = explode("/", $path);
    
    if (count($parts) < 2) {
      return [
        "language" => $defaultLanguage,
        "page" => "",
        "id" => ""
      ];
    }

    if (count($parts) === 2) {
      if (in_array($parts[1], $languages)) {
        return [
          "language" => $parts[1],
          "page" => "",
          "id" => ""
        ];
      } else {
        return [
          "language" => $defaultLanguage,
          "page" => $parts[1] === "/" ? "" : $parts[1],
          "id" => ""
        ];
      }
    }

    if (count($parts) === 3) {
      // second element could be page-language pair or page-id
      if (in_array($parts[1], $languages)) {
        return [
          "language" => $parts[1],
          "page" => $parts[2] === "/" ? "" : $parts[2],
          "id" => ""
        ];
      } else {
        return [
          "language" => $defaultLanguage,
          "page" => $parts[1] === "/" ? "" : $parts[1],
          "id" => $parts[2],
        ];
      }
    }

    if (count($parts) === 4) {
      // second element could be page-language pair or page-id
      return [
        "language" => (in_array($parts[1], $languages)) ? $parts[1] : $defaultLanguage,
        "page" => $parts[2] === "/" ? "" : $parts[2],
        "id" => $parts[3],
      ];
    }
  
    return $path;
  }

  function changeLanguage($way, $language) {
    if ($way["id"] != "") {
      return "/".$language."/".$way["page"]."/".$way["id"];
    }
    if ($way["page"] != "") {
      return "/".$language."/".$way["page"];
    }
    return "/".$language;
  }

  function changePage($way, $page) {
    if ($page[0] == "/") {
      $page = substr($page, 1, strlen($page));
    }
    if (isset($way["page"])) {
      return "/".$way["language"]."/".$page;
    }
    return "/".$way["language"];
  }

  function changeId($way, $id) {
    if (isset($way["id"])) {
      return "/".$way["language"]."/".$way["page"]."/".$id;
    }
    if (isset($way["page"])) {
      return "/".$way["language"]."/".$way["page"];
    }
    return "/".$way["language"];
  }

  // test cases
  // $testCases = [
  //   '',
  //   '/',
  //   '/en',
  //   '/services',
  //   '/services/id',
  //   '/ru/services',
  //   '/en/services',
  //   '/en/services/id',
  //   '/cz/services/id'
  // ];
  // for($i = 0; $i < count($testCases); $i++) {
  //   $res = parse($testCases[$i]);
  //   var_dump($res);
  // }
?>
