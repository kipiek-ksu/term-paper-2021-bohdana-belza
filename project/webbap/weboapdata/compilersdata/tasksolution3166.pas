function degree(m:integer):integer;
var l,res:integer;
begin
 case (m) of
      0:degree:=1;
      1:degree:=8;
 else begin
 res:=8;
 for l:=2 to m do res:=res*8;
 degree:=res;
 end;
 end;
end;

procedure oct_to_dec(oct:integer; var dec:integer);
var mas:array[1..10] of integer;
    h,res,k:integer;
begin
 k:=1;
 while (oct>9) do
 begin
  mas[k]:=oct mod 10;
  oct:=oct div 10;
  k:=k+1;
 end;
 mas[k]:=oct;
 res:=0;
 for h:=1 to k do
 begin
  res:=res+mas[h]*degree(h-1);
 end;
 dec:=res;
end;

var a,r:integer;

begin
read(a);
oct_to_dec(a,r);
write(r);
end.