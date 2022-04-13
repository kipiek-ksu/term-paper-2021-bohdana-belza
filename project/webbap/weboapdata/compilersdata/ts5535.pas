function eq(a,b:integer):char;
begin
if a>b then eq:='>' else 
  if a<b then eq:='<' else 
    if a=b then eq:='=';
 end;
BEGIN 
var a,b:integer;
read(a,b);
write(eq(a,b));
end.
