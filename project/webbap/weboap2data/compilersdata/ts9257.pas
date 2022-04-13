program z6;
var str:string;

procedure inout(var str:string);
var r:string;
    i,n,m:integer;
begin
     r:='YES';
     n:=length(str);
     m:=(n div 2);
     for i:=1 to m do
       if str[i]<>str[n-i+1] then
        r:='NO';
     writeln(r)
end;

begin
   read(str);
   inout(str)
end