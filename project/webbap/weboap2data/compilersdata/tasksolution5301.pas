program ercoder;
 var x:integer;y,z:byte;k:boolean;
begin
 readln(x);
 k:=true;
 if (x>=100)and(x<=999) then
  begin
   y:=((x mod 10)*10)+((x mod 100)div 10);
   z:=x div 100;
  end else k:=false;
 if k then writeln('y=',y,'     ','z=',z) else writeln('Error');
end.
