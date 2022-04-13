Program pr18;
Var x,y,a,b:real;
begin
read(x,y);
   if ((x<0) and (y<0)) then
   begin
     a:=Abs(x);
     b:=Abs(y);
   end;
   if ((x>0) and(y<0)) or ((x<0) and(y>0)) then
   begin
     a:=x+0.5;
     b:=y+0.5;
   end;
   if (((x>0) and (x<0.5)) or (x>2.0)) and
      (((y>0) and (y<0.5)) or (y>2.0)) then
   begin
      a:=x/10;
      b:=y/10;
   end;
   if ((x>=0.5) and (x<=2.0) and
      ((y>=0.5) and (y<=2.0)) then
  begin
      a:=x;
      b:=y;
  end;
   writeln(a:2:2,' ',b:2:2);
end.
