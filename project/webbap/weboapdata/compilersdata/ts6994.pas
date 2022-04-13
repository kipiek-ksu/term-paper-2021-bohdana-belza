program b1;
   var x,y,z:integer;
   begin
   read(x);
   y:=(x mod 10) mod 10;
   y:=y*10;
   y:=y+((x mod 100) div 10);
   z:x div 100;
   write(y,' ',z);
end.