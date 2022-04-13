program tema4_65;
var t,h,m: integer;
    c: char;

begin
 read(t);
 h:=t div 60;
 m:=t mod 60;
 if h<m then
  c:='<'
 else
  if h>m then
   c:='>'
  else
   c:='=';
  write(h,' ',m);
  write(h',c,'m);
end.