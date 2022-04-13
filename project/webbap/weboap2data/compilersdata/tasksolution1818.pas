program p_1;
var n:string;
function pol(n:string):boolean;
begin
 if length(n)<2 then pol:=true else
    if n[1]=n[length(n)] then
    begin
    delete(n,1,1);
    delete(n,length(n),1);
    pol:=pol(n);
    end
   else pol:=false

end;
begin
readln(n);
if pol(n) then write('TRUE') else write('FALSE');
end.