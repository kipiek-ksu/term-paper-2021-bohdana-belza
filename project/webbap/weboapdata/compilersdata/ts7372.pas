program Z;
var a:integer;
function BinToDec(r: sting): longint; 
var 
i: integer; 
begin 
Result := 0; 
for i := 1 to length(bin) do 
begin 
if not (r in [′0′,′1′]) then 
begin 
Result := 0; 
Exit; 
end; 
if r = ′1′ then 
Result := Result + (1 shl (length(r) - i)); 
end; 
end; 
degin
read(a);
function BinToDec(r: sting): 
end.