program zzz;
var
 a,b: array [1..10] of integer;
 m,q,w,n,i: integer;

function maxel(c:array of integer;n:integer):integer;
 var max,i:integer;
begin
  max:=c[0];
  for i:=1 to n-1 do
   begin
   if c[i]>max then
   max:=c[i];
   end;
 maxel:=max;
end;

begin
  read(m,n);
for i:=1 to m do
  begin
 read(a[i]);
  end;
for i:=1 to n do
 begin
read(b[i]);
 end;
q:=maxel(a,m);
w:=maxel(b,n);
if (q=w) then write('yes') else write('no');
end.