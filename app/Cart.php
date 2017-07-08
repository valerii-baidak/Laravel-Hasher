<?php

namespace App;


class Cart
{

	public $words      = null;
	public $hash       = null;
	public $wordItem   = null;

	public function __construct($oldCart)
	{
		if ($oldCart) {
			$this->wordItem = $oldCart->wordItem;
			$this->words = $oldCart->words;
			$this->hash  = $oldCart->hash;
		}
	}

	public function addWord ($word, $id) {
		if (count($this->hash) > 0 ) {
			foreach ($this->hash as $key => $value) {
				$this->wordItem[$id]['encrypt'][$value] = hash ($value, $word);
			}
		}
		$this->words[$id] =  $word;
		$this->wordItem[$id]['word'] = $word;
	}

	public function addHash($hash) {;
		if (count($this->words) > 0) {
			foreach ($this->words as $key => $value) {
				$this->wordItem[$key]['encrypt'][$hash] =  hash ($hash, $value);
			}
		}
		$this->hash[$hash] = $hash;

	}

	public function removeHash ($hash) {
		if (count($this->words) > 0) {
			foreach ($this->words as $key => $value) {
				unset($this->wordItem[$key]['encrypt'][$hash]);
			}
		}
		unset($this->hash[$hash]);
	}

	public function removeWord ($word) {
		unset($this->wordItem[$word]);
		unset ($this->words[$word]);
	}

}