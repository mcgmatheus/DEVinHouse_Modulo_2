<?php

class Enemy
{
  private $id;
  private $name;
  private $life;
  private $damage;
  private $defense;
  private $level;
  private $type;

public function getid(){
  return $this->id;
}
public function getName(){
  return $this->name;
}
public function setName($name){
  return $this->name = $name;
}
public function getLife(){
  return $this->life;
}
public function setLife($life){
  return $this->life = $life;
}
public function getDamage(){
  return $this->damage;
}
public function setDamage($damage){
  return $this->damage = $damage;
}
public function getDefense(){
  return $this->defense;
}
public function setDefense($defense){
  return $this->defense = $defense;
}
public function getLevel(){
  return $this->level;
}
public function setLevel($level){
  return $this->level = $level;
}
public function getType(){
  return $this->type;
}
public function setType($type){
  return $this->type = $type;
}
public function atacar(){
  
}
}