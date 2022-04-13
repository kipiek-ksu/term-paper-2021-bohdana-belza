program z_27;
var
  v,s,t:real;
  procedure shpargalka(v,s:real;
  var t:real);
begin
  t:=s/v;
end;
begin
  read(v,s);
  shpargalka(v,s,t);
  write(t:4:2);
end.
