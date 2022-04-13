program z14;
var x,y:integer;
function znak(a,b:integer):char;
begin
  if a>b then znak:='>' else
  if a<b then znak:='<' else
  znak:='=';
end;
begin
  read(x,y);
  write(znak(x,y));
end.