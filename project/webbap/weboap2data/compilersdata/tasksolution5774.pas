program z25;
var a,b:integer;
begin
  readln (a);
  if (a>12) and (a<1) then writeln ('Error')
  else if (a>=1) and (a<=3) then b:=1
  else if (a>3) and (a<=6) then b:=2
  else if (a>6) and (a<=9) then b:=3
  else if (a>9) and (a<=12) then b:=4;
  write (b);
end.