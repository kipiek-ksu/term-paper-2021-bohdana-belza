program year;
var  a,b,c:word;
begin

read(a);

read(b);

readln(c);

if (c mod 4=0) and ((c mod 100<>0) or (c mod 400=0)) then
case b of
1,3,5,7,8,10,12:
  if a=31 then
    if b=12 then
      begin
      a:=1; b:=1; c:=c+1;
      end
    else
      begin
      a:=1;
      b:=b+1;
      end
  else
      a:=a+1;
4,6,9,11:
  if a=30 then
      begin
      a:=1;
      b:=b+1;
      end
  else
      a:=a+1;
2:
  if a=29 then
      begin
      a:=1;
      b:=3;
      end
  else
      a:=a+1;
end
  else
case b of
1,3,5,7,8,10,12:
  if a=31 then
    if b=12 then
      begin
      a:=1; b:=1; c:=c+1;
      end
    else
      begin
      a:=1;
      b:=b+1;
      end
  else
      a:=a+1;
4,6,9,11:
  if a=30 then
      begin
      a:=1;
      b:=b+1;
      end
  else
      a:=a+1;
2:
  if a=28 then
      begin
      a:=1;
      b:=3;
      end
  else
      a:=a+1;
end;
writeln('The next date is: ',a,'.',b,'.',c);
readln;
end.
